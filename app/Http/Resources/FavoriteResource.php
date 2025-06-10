<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FavoriteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $destination = new DestinationResource($this->destination);
        $formattedCreatedAt = Carbon::parse($this->created_at)->format('d-m-Y H:i:s');

        return [
            "id" => $this->id,
            "destination" => $destination,
            'createdAt' => $formattedCreatedAt
        ];
    }
}
