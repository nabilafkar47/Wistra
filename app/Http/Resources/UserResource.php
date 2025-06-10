<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $formattedCreatedAt = Carbon::parse($this->created_at)->format('d-m-Y H:i:s');
        $formattedUpdatedAt = Carbon::parse($this->updated_at)->format('d-m-Y H:i:s');
        $image = $this->image ? asset('storage/' . $this->image) : null;

        return [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "role" => $this->role,
            'image' => $image,
            'createdAt' => $formattedCreatedAt,
            'updatedAt' => $formattedUpdatedAt
        ];
    }
}
