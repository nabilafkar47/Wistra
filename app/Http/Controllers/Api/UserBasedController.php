<?php

namespace App\Http\Controllers\Api;

use App\Models\Review;
use App\Models\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\DestinationResource;

class UserBasedController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'userLatitude' => 'nullable|numeric|between:-90,90',
            'userLongitude' => 'nullable|numeric|between:-180,180',
        ]);

        // Ambil user yang sedang login
        $user = Auth::user();

        // Ambil semua review dari database
        $reviews = Review::all();

        // Cek apakah user sudah memberikan ulasan
        $userHasReviews = $reviews->where('user_id', $user->id)->count() > 0;

        // Jika user belum memberikan ulasan, tampilkan pesan
        if (!$userHasReviews) {
            return response()->json([
                'error' => false,
                'message' => 'Looks like we don’t have enough data yet. Please rate some destinations to help us recommend the best for you!',
                'data' => []
            ]);
        }

        // Langkah 1: Hitung rata-rata rating setiap pengguna
        $userAverages = [];
        foreach ($reviews->groupBy('user_id') as $userId => $userReviews) {
            $userAverages[$userId] = $userReviews->avg('rating');
        }

        // Langkah 2: Hitung Adjusted Cosine Similarity dan filter similarity positif (>= 0.3)
        $similarities = [];
        $filteredSimilarities = [];
        foreach ($reviews->groupBy('user_id') as $otherUserId => $otherUserReviews) {
            if ($otherUserId == $user->id) continue; // Skip pengguna yang sama

            $numerator = 0;
            $denominatorUser = 0;
            $denominatorOtherUser = 0;

            foreach ($otherUserReviews as $otherUserReview) {
                $userReview = $reviews->where('user_id', $user->id)
                    ->where('destination_id', $otherUserReview->destination_id)
                    ->first();

                if ($userReview) {
                    $numerator += ($userReview->rating - $userAverages[$user->id]) * ($otherUserReview->rating - $userAverages[$otherUserId]);
                    $denominatorUser += pow($userReview->rating - $userAverages[$user->id], 2);
                    $denominatorOtherUser += pow($otherUserReview->rating - $userAverages[$otherUserId], 2);
                }
            }

            if ($denominatorUser > 0 && $denominatorOtherUser > 0) {
                $similarity = $numerator / (sqrt($denominatorUser) * sqrt($denominatorOtherUser));
                $similarities[$otherUserId] = $similarity;

                // Save similarity yang >= 0.3 ke dalam $filteredSimilarities
                if ($similarity >= 0.3) {
                    $filteredSimilarities[$otherUserId] = $similarity;
                }
            }
        }

        // Langkah 3: Prediksi rating untuk item yang belum di-rating
        $predictedRatings = [];
        foreach ($reviews->groupBy('destination_id') as $destinationId => $destinationReviews) {
            $userHasRated = $destinationReviews->where('user_id', $user->id)->count() > 0;

            if (!$userHasRated) {
                $numerator = 0;
                $denominator = 0;

                // Hanya gunakan similarity positif untuk prediksi
                foreach ($filteredSimilarities as $otherUserId => $similarity) {
                    $otherUserReview = $destinationReviews->where('user_id', $otherUserId)->first();

                    if ($otherUserReview) {
                        $numerator += $similarity * ($otherUserReview->rating - $userAverages[$otherUserId]);
                        $denominator += abs($similarity);
                    }
                }

                if ($denominator > 0) {
                    $predictedRatings[$destinationId] = $userAverages[$user->id] + ($numerator / $denominator);
                }
            }
        }

        // Langkah 4: Rekomendasikan item dengan prediksi rating tertinggi
        $recommendedDestinations = array_filter($predictedRatings, function ($rating) {
            return $rating > 0; // Hanya masukkan destinasi dengan prediksi rating > 0
        });

        arsort($recommendedDestinations); // Urutkan dari skor yang terbesar
        $recommendedDestinations = array_slice($recommendedDestinations, 0, 5, true); // Ambil 5 destinasi teratas

        // Jika tidak ada destinasi yang direkomendasikan, berikan rekomendasi default
        if (empty($recommendedDestinations)) {
            // Cari destinasi populer (berdasarkan rating)
            $popularDestinations = Destination::with('reviews')
                ->withAvg('reviews', 'rating') // Hitung rata-rata rating dari relasi reviews
                ->orderByDesc('reviews_avg_rating') // Urutkan berdasarkan rata-rata rating
                ->take(5)
                ->get();

            // Jika tidak ada destinasi populer, rekomendasikan destinasi acak
            if ($popularDestinations->isEmpty()) {
                $randomDestinations = Destination::inRandomOrder()->take(5)->get();

                // Jika tidak ada destinasi, beri pesan
                if ($randomDestinations->isEmpty()) {
                    return response()->json([
                        'error' => false,
                        'message' => "Oops, it seems we don’t have any destinations to recommend yet!",
                        'data' => []
                    ]);
                }

                return response()->json([
                    'error' => false,
                    'message' => "We can’t personalize your recommendations yet. Here are some random gems to explore!",
                    'data' => DestinationResource::collection($randomDestinations)
                ]);
            }

            return response()->json([
                'error' => false,
                'message' => "We’re still learning your taste. Check out these popular picks for now!",
                'data' => DestinationResource::collection($popularDestinations)
            ]);
        }

        // Ambil destinasi yang direkomendasikan beserta score-nya
        $destinations = Destination::whereIn('id', array_keys($recommendedDestinations))
            ->get()
            ->map(function ($destination) use ($recommendedDestinations) {
                $destination->score = $recommendedDestinations[$destination->id];
                return $destination;
            })
            ->sortByDesc('score'); // Urutkan destinasi berdasarkan score

        // Return dalam format yang sama seperti HaversineController
        return response()->json([
            'error' => false,
            'message' => 'Recommendations retrieved successfully.',
            'data' => DestinationResource::collection($destinations),
        ]);

        // Return semua nilai untuk validasi
        // return response()->json([
        //     'user_averages' => $userAverages,
        //     'similarities' => $similarities, // Semua similarity (termasuk negatif)
        //     'filtered_similarities' => $filteredSimilarities, // Hanya similarity positif
        //     'predicted_ratings' => $predictedRatings,
        //     'recommended_destinations' => $recommendedDestinations,
        // ]);
    }
}
