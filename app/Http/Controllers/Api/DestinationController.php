<?php

namespace App\Http\Controllers\Api;

use App\Models\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DestinationResource;
use App\Http\Resources\DestinationDetailResource;

class DestinationController extends Controller
{
    public function index(Request $request)
    {
        // Validate request parameters
        $request->validate([
            'search' => 'nullable|string|max:255',
            'city' => 'nullable|exists:cities,id',
            'category' => 'nullable|exists:categories,id',
            'sort_by' => 'nullable|in:name,rating,distance',
            'order' => 'nullable|in:asc,desc',
            'userLatitude' => 'required_if:sort_by,distance|nullable|numeric|between:-90,90',
            'userLongitude' => 'required_if:sort_by,distance|nullable|numeric|between:-180,180'
        ]);

        // Build the query
        $query = Destination::with(['city', 'category', 'destinationImages', 'reviews']);

        // Search filter
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                    ->orWhereHas('city', fn($q) => $q->where('name', 'like', "%{$searchTerm}%"))
                    ->orWhereHas('category', fn($q) => $q->where('name', 'like', "%{$searchTerm}%"));
            });
        }

        // City filter
        if ($request->has('city')) {
            $query->where('city_id', $request->input('city'));
        }

        // Category filter
        if ($request->has('category')) {
            $query->where('category_id', $request->input('category'));
        }

        // Sorting
        if ($request->has('sort_by') && $request->has('order')) {
            $sortBy = $request->input('sort_by');
            $orderDirection = $request->input('order');

            if ($sortBy === 'name') {
                $query->orderBy('name', $orderDirection);
            } elseif ($sortBy === 'rating') {
                $query->withAvg('reviews', 'rating')
                    ->orderBy('reviews_avg_rating', $orderDirection);
            } elseif ($sortBy === 'distance') {
                $userLat = $request->input('userLatitude');
                $userLon = $request->input('userLongitude');

                // Add Haversine formula for distance calculation
                $query->selectRaw('*, (
                    6371 * acos(
                        cos(radians(?)) * cos(radians(latitude)) * 
                        cos(radians(longitude) - radians(?)) +
                        sin(radians(?)) * sin(radians(latitude))
                    )
                ) AS distance', [$userLat, $userLon, $userLat])
                    ->orderBy('distance', $orderDirection);
            }
        }

        // Get all results
        $destinations = $query->get();

        // Prepare response
        return response()->json([
            'error' => false,
            'message' => $destinations->isEmpty() ? 'No destinations found.' : 'Destinations retrieved successfully.',
            'dataCount' => $destinations->count(),
            'data' => DestinationResource::collection($destinations),
            'filters' => [
                'search' => $request->input('search'),
                'city' => $request->input('city'),
                'category' => $request->input('category'),
                'sort_by' => $request->input('sort_by'),
                'order' => $request->input('order'),
                'userLatitude' => $request->input('userLatitude'),
                'userLongitude' => $request->input('userLongitude')
            ]
        ]);
    }

    public function show($destinationId, Request $request)
    {
        // Validasi parameter latitude dan longitude (opsional)
        $request->validate([
            'userLatitude' => 'nullable|numeric|between:-90,90',
            'userLongitude' => 'nullable|numeric|between:-180,180'
        ]);

        $destination = Destination::with(['city', 'category', 'destinationImages', 'reviews'])
            ->findOrFail($destinationId);

        return response()->json([
            'error' => false,
            'message' => 'Destination details retrieved successfully.',
            'data' => new DestinationDetailResource($destination)
        ]);
    }
}
