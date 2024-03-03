<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource
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
            'category_id' => $this->resource->category_id,
            'subcategory_id' => $this->resource->subcategory_id,
            'name' => $this->resource->name,
            'slug' => $this->resource->slug,
            'category' => [
                'name' => $this->resource->category->name,
            ],
            'subcategory' => [
                'name' => $this->resource->subcategory->name,
            ],
        ];
    }
}
