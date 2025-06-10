<?php

namespace App\Http\Controllers\Api;

use App\HaversineTrait;
use App\Models\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DestinationResource;

class HaversineController extends Controller
{
    use HaversineTrait;

    public function index(Request $request)
    {
        $request->validate([
            'userLatitude' => 'required|numeric|between:-90,90',
            'userLongitude' => 'required|numeric|between:-180,180',
            'limit' => 'nullable|integer|min:1'
        ]);

        $userLatitude = $request->userLatitude;
        $userLongitude = $request->userLongitude;
        $limit = $request->has('limit') ? $request->limit : null;

        $destinations = Destination::with(['city', 'destinationImages', 'reviews'])->get();

        if ($destinations->isEmpty()) {
            return response()->json([
                'error' => false,
                'message' => 'No destinations found.',
                'data' => []
            ]);
        }

        $recommendations = [];

        foreach ($destinations as $destination) {
            $distance = $this->calculateHaversineDistance(
                $userLatitude,
                $userLongitude,
                $destination->latitude,
                $destination->longitude
            );

            if ($distance <= 25) {
                $destination->distanceKm = $distance;
                $recommendations[] = $destination;
            }
        }

        usort($recommendations, fn($a, $b) => $a->distanceKm <=> $b->distanceKm);

        if ($limit !== null && count($recommendations) > $limit) {
            $recommendations = array_slice($recommendations, 0, $limit);
        }

        return response()->json([
            'error' => false,
            'message' => empty($recommendations) ? 'Oops, looks like there’s nothing nearby yet! How about exploring a bit further?' : 'Successfully retrieved recommendations.',
            'data' => DestinationResource::collection($recommendations)
        ]);
    }
}
