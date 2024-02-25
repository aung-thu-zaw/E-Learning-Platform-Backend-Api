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
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $request->is('api/v1/admin/sliders/*') && $request->method() !== 'PUT' ? $this->description : str()->limit($this->description, 50, '...'),
            'button' => $this->button,
            'url' => $this->url,
            'status' => $this->status,
            'image' => $this->image,
        ];
    }
}
