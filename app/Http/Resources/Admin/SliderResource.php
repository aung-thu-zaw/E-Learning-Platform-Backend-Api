<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
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
            'title' => $this->resource->title,
            'slug' => $this->resource->slug,
            'description' => $request->is('api/v1/admin/sliders/*') && $request->method() !== 'PUT' ? $this->resource->description : str()->limit($this->resource->description, 50, '...'),
            'button' => $this->resource->button,
            'url' => $this->resource->url,
            'status' => $this->resource->status,
            'image' => $this->resource->image,
        ];
    }
}
