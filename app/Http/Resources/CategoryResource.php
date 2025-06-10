<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $image = asset('storage/' . $this->image);

        return [
            "id" => $this->id,
            "name" => $this->name,
            'image' => $image
        ];
    }
}
