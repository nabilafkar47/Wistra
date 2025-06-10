<?php

namespace App\Http\Controllers\Api;

use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\FavoriteResource;

class FavoriteController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'userLatitude' => 'nullable|numeric|between:-90,90',
            'userLongitude' => 'nullable|numeric|between:-180,180',
        ]);

        $favorites = Favorite::with('destination')
            ->where('user_id', Auth::id())
            ->get();

        return response()->json([
            'error' => false,
            'message' => $favorites->isEmpty() ? 'No favorites found.' : 'Favorites retrieved successfully.',
            'dataCount' => $favorites->count(),
            'data' => FavoriteResource::collection($favorites)
        ]);
    }

    public function toggleFavorite($destinationId)
    {
        $userId = Auth::id();
        $existingFavorite = Favorite::where('user_id', $userId)
            ->where('destination_id', $destinationId)
            ->first();

        if ($existingFavorite) {
            $existingFavorite->delete();
            return response()->json([
                'error' => false,
                'message' => 'Destination removed from favorites successfully.',
                'isFavorite' => false
            ], 200);
        }

        Favorite::create([
            'user_id' => $userId,
            'destination_id' => $destinationId
        ]);

        return response()->json([
            'error' => false,
            'message' => 'Destination added to favorites successfully.',
            'isFavorite' => true
        ], 201);
    }

    public function deleteAllFavorites()
    {
        $userId = Auth::id();
        $deletedCount = Favorite::where('user_id', $userId)->delete();

        return response()->json([
            'error' => false,
            'message' => $deletedCount > 0 ? 'All favorites deleted successfully.' : 'No favorites to delete.',
        ], 200);
    }
}
