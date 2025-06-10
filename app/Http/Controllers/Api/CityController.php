<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();

        return response()->json([
            'error' => false,
            'message' => $cities->isEmpty() ? 'No cities found.' : 'Cities retrieved successfully.',
            'data' => CityResource::collection($cities)
        ]);
    }
}
