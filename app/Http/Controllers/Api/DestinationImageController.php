<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\DestinationImage;
use App\Http\Controllers\Controller;
use App\Http\Resources\DestinationImageResource;

class DestinationImageController extends Controller
{
    public function index(Request $request, $destinationId)
    {
        // Validasi input limit
        $request->validate([
            'limit' => 'nullable|integer|min:1'
        ]);

        // Ambil limit jika ada
        $limit = $request->has('limit') ? $request->limit : null;

        // Query dasar
        $query = DestinationImage::where('destination_id', $destinationId)->orderBy('id', 'asc');

        // Terapkan limit jika ada
        if ($limit !== null) {
            $query->limit($limit);
        }

        $images = $query->get();

        return response()->json([
            'error' => false,
            'message' => $images->isEmpty() ? 'No images found.' : 'Images retrieved successfully.',
            'dataCount' => $images->count(),
            'data' => DestinationImageResource::collection($images),
        ]);
    }
}
