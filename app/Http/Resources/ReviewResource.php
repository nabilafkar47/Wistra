<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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

        $userAvatar = $this->user->image
            ? asset('storage/' . $this->user->image)
            : null;

        return [
            'id' => $this->id,
            'userId' => $this->user->id,
            'name' => $this->user->name,
            'avatar' => $userAvatar,
            'rating' => $this->rating,
            'comment' => $this->comment,
            'createdAt' => $formattedCreatedAt,
            'updatedAt' => $formattedUpdatedAt
        ];
    }
}
