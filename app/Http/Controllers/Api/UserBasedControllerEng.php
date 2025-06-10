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
        // Validate optional user location coordinates (used in another context if needed)
        $request->validate([
            'userLatitude' => 'nullable|numeric|between:-90,90',
            'userLongitude' => 'nullable|numeric|between:-180,180',
        ]);

        // Get the currently authenticated user
        $user = Auth::user();

        // Retrieve all reviews from the database
        $reviews = Review::all();

        // Check if the current user has submitted any reviews
        $userHasReviews = $reviews->where('user_id', $user->id)->count() > 0;

        // If the user has not submitted any reviews, show an informative message
        if (!$userHasReviews) {
            return response()->json([
                'error' => false,
                'message' => 'Looks like we don’t have enough data yet. Please rate some destinations to help us recommend the best for you!',
                'data' => []
            ]);
        }

        // Step 1: Calculate the average rating for each user
        $userAverages = [];
        foreach ($reviews->groupBy('user_id') as $userId => $userReviews) {
            $userAverages[$userId] = $userReviews->avg('rating');
        }

        // Step 2: Calculate Adjusted Cosine Similarity and filter similarities (>= 0.3)
        $similarities = [];
        $filteredSimilarities = [];
        foreach ($reviews->groupBy('user_id') as $otherUserId => $otherUserReviews) {
            if ($otherUserId == $user->id) continue; // Skip similarity with oneself

            $numerator = 0;
            $denominatorUser = 0;
            $denominatorOtherUser = 0;

            foreach ($otherUserReviews as $otherUserReview) {
                // Find if both users reviewed the same destination
                $userReview = $reviews->where('user_id', $user->id)
                    ->where('destination_id', $otherUserReview->destination_id)
                    ->first();

                if ($userReview) {
                    $numerator += ($userReview->rating - $userAverages[$user->id]) * ($otherUserReview->rating - $userAverages[$otherUserId]);
                    $denominatorUser += pow($userReview->rating - $userAverages[$user->id], 2);
                    $denominatorOtherUser += pow($otherUserReview->rating - $userAverages[$otherUserId], 2);
                }
            }

            // Store similarity if denominator is not zero (to avoid division by zero)
            if ($denominatorUser > 0 && $denominatorOtherUser > 0) {
                $similarity = $numerator / (sqrt($denominatorUser) * sqrt($denominatorOtherUser));
                $similarities[$otherUserId] = $similarity;

                // Only store >= 0.3 similarities for recommendations
                if ($similarity >= 0.3) {
                    $filteredSimilarities[$otherUserId] = $similarity;
                }
            }
        }

        // Step 3: Predict ratings for destinations the user hasn't rated
        $predictedRatings = [];
        foreach ($reviews->groupBy('destination_id') as $destinationId => $destinationReviews) {
            $userHasRated = $destinationReviews->where('user_id', $user->id)->count() > 0;

            if (!$userHasRated) {
                $numerator = 0;
                $denominator = 0;

                // Use only >= 0.3 similarity values
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

        // Step 4: Recommend destinations with the highest predicted ratings
        $recommendedDestinations = array_filter($predictedRatings, function ($rating) {
            return $rating > 0; // Only include items with positive predicted ratings
        });

        arsort($recommendedDestinations); // Sort by rating descending
        $recommendedDestinations = array_slice($recommendedDestinations, 0, 5, true); // Take top 5 destinations

        // If no recommendations are found, provide fallback suggestions
        if (empty($recommendedDestinations)) {
            // Retrieve popular destinations based on average rating
            $popularDestinations = Destination::with('reviews')
                ->withAvg('reviews', 'rating')
                ->orderByDesc('reviews_avg_rating')
                ->take(5)
                ->get();

            // If no popular destinations, recommend random ones
            if ($popularDestinations->isEmpty()) {
                $randomDestinations = Destination::inRandomOrder()->take(5)->get();

                // If there are no destinations at all
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

        // Retrieve recommended destinations and attach their prediction score
        $destinations = Destination::whereIn('id', array_keys($recommendedDestinations))
            ->get()
            ->map(function ($destination) use ($recommendedDestinations) {
                $destination->score = $recommendedDestinations[$destination->id];
                return $destination;
            })
            ->sortByDesc('score'); // Sort by predicted score

        // Return recommendation result in a standardized format
        return response()->json([
            'error' => false,
            'message' => 'Recommendations retrieved successfully.',
            'data' => DestinationResource::collection($destinations),
        ]);
    }
}
