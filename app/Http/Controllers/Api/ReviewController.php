<?php

namespace App\Http\Controllers\Api;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ReviewResource;

class ReviewController extends Controller
{

    public function store(Request $request, $destinationId)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500'
        ]);

        $validated['user_id'] = Auth::id();
        $validated['destination_id'] = $destinationId;

        $existingReview = Review::where('user_id', Auth::id())
            ->where('destination_id', $destinationId)
            ->first();

        if ($existingReview) {
            return response()->json([
                'error' => false,
                'message' => 'You have already submitted a review. Please update it instead.'
            ], 400);
        }

        Review::create($validated);

        return response()->json([
            'error' => false,
            'message' => 'Review added successfully'
        ], 201);
    }

    public function index(Request $request, $destinationId)
    {
        // Validasi input limit
        $request->validate([
            'limit' => 'nullable|integer|min:1'
        ]);

        // Ambil limit jika ada
        $limit = $request->has('limit') ? $request->limit : null;

        // Query dasar
        $query = Review::with('user')->where('destination_id', $destinationId)->orderBy('id', 'desc');

        // Terapkan limit jika ada
        if ($limit !== null) {
            $query->limit($limit);
        }

        $reviews = $query->get();

        return response()->json([
            'error' => false,
            'message' => $reviews->isEmpty() ? 'No reviews found.' : 'Reviews retrieved successfully.',
            'dataCount' => $reviews->count(),
            'data' => ReviewResource::collection($reviews),
        ]);
    }

    public function update(Request $request, $destinationId)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500'
        ]);

        $review = Review::where('user_id', Auth::id())
            ->where('destination_id', $destinationId)
            ->firstOrFail();

        $review->update($validated);

        return response()->json([
            'error' => false,
            'message' => 'Review updated successfully'
        ], 200);
    }

    public function destroy($destinationId)
    {
        $review = Review::where('user_id', Auth::id())
            ->where('destination_id', $destinationId)
            ->firstOrFail();

        $review->delete();

        return response()->json([
            'error' => false,
            'message' => 'Review deleted successfully'
        ], 200);
    }

    public function getUserReview($destinationId)
    {
        $review = Review::where('user_id', Auth::id())
            ->where('destination_id', $destinationId)
            ->first();

        if (!$review) {
            return response()->json([
                'error' => false,
                'message' => 'No review found.',
                'data' => []
            ], 404);
        }

        return response()->json([
            'error' => false,
            'message' => 'Review retrieved successfully.',
            'data' => new ReviewResource($review)
        ], 200);
    }
}
