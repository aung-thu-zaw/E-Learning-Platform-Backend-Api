<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubcategoryResource extends JsonResource
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
            'name' => $this->resource->name,
            'slug' => $this->resource->slug,
            'description' => $request->is('api/v1/admin/subcategories/*') && $request->method() !== 'PUT' ? $this->resource->description : str()->limit($this->resource->description, 60, '...'),
            'image' => $this->resource->image,
            'status' => $this->resource->status,
            'category' => [
                'name' => $this->resource->category->name,
                'count' => $this->resource->category->count(),
            ],
        ];
    }
}
