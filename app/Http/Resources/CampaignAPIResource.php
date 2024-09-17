<?php

namespace App\Http\Resources;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Campaign */
class CampaignAPIResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image,
            'organization' => $this->organization,
            'donation_amount' => $this->donation_amount,
            'donation_count' => $this->donation_count,
            'created_at' => $this->created_at,
        ];
    }
}
