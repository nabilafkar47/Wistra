<?php

namespace App\Http\Resources;

use App\HaversineTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class DestinationResource extends JsonResource
{
    use HaversineTrait;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $destinationImage = $this->destinationImages->first()
            ? asset('storage/' . $this->destinationImages->first()->image)
            : null;

        $averageRating = $this->reviews->avg('rating')
            ? round($this->reviews->avg('rating'), 1)
            : null;

        $isFavorite = Auth::check() && $this->favorites->where('user_id', Auth::id())->count() > 0;

        // Ambil koordinat pengguna dari request
        $userLatitude = $request->input('userLatitude');
        $userLongitude = $request->input('userLongitude');

        // Hitung distanceKm hanya jika koordinat valid (bukan null dan bukan 0.0, 0.0) dan distanceKm belum di-set
        $distanceKm = $this->distanceKm;
        if (
            $distanceKm === null &&
            $userLatitude !== null &&
            $userLongitude !== null &&
            !($userLatitude == 0.0 && $userLongitude == 0.0) && // Jangan hitung jika 0.0, 0.0
            $this->latitude !== null &&
            $this->longitude !== null
        ) {
            $distanceKm = $this->calculateHaversineDistance(
                $userLatitude,
                $userLongitude,
                $this->latitude,
                $this->longitude
            );
        }
        
        return [
            'id' => $this->id,
            'name' => $this->name,
            'city' => $this->city->name,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'category' => $this->category->name,
            'firstImage' => $destinationImage,
            'averageRating' => $averageRating,
            'distanceKm' => $distanceKm,
            'score' => $this->when(isset($this->score), $this->score),
            'isFavorite' => $isFavorite
        ];
    }
}
