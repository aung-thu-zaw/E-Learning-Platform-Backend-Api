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
            'id' => $this->resource->id,
            'description' => $this->resource->description,
            'url' => $this->resource->url,
            'button' => $this->resource->button,
            'countdown' => $this->resource->countdown,
            'start_date_time' => $this->resource->start_date_time,
            'end_date_time' => $this->resource->end_date_time,
            'is_active' => $this->resource->is_active,
        ];
    }
}
