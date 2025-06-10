<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SliderResource;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();

        return response()->json([
            'error' => false,
            'message' => $sliders->isEmpty() ? 'No sliders found.' : 'Sliders retrieved successfully.',
            'data' => SliderResource::collection($sliders)
        ]);
    }
}
