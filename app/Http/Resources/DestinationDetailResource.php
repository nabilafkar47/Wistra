<?php

namespace App\Http\Resources;

use App\HaversineTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class DestinationDetailResource extends JsonResource
{
    use HaversineTrait;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $averageRating = $this->reviews->avg('rating')
            ? round($this->reviews->avg('rating'), 1)
            : null;

        $reviewsCount = $this->reviews->count();
        $photosCount = $this->destinationImages->count();
        $isFavorite = Auth::check() && $this->favorites->where('user_id', Auth::id())->count() > 0;

        $distanceKm = null;
        if ($request->has('userLatitude') && $request->has('userLongitude')) {
            $distanceKm = $this->calculateHaversineDistance(
                $request->input('userLatitude'),
                $request->input('userLongitude'),
                $this->latitude,
                $this->longitude
            );
        }

        $firstImage = $this->destinationImages->first() ? asset('storage/' . $this->destinationImages->first()->image) : null;

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'city' => $this->city->name,
            'category' => $this->category->name,
            'averageRating' => $averageRating,
            'reviewsCount' => $reviewsCount,
            'photosCount' => $photosCount,
            'distanceKm' => $distanceKm,
            'isFavorite' => $isFavorite,
            'firstImage' => $firstImage,
        ];
    }
}
