<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NavBannerResource extends JsonResource
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
            'description' => $this->description,
            'url' => $this->url,
            'button' => $this->button,
            'countdown' => $this->countdown,
            'start_date_time' => $this->start_date_time,
            'end_date_time' => $this->end_date_time,
            "is_active" => $this->is_active
        ];
    }
}
