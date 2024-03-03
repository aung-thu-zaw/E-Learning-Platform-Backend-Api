<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogCategoryResource extends JsonResource
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
            'name' => $this->resource->name,
            'slug' => $this->resource->slug,
            'description' => $request->is('api/v1/admin/blog-categories/*') && $request->method() !== 'PUT' ? $this->resource->description : str()->limit($this->resource->description, 60, '...'),
            'status' => $this->resource->status,
        ];
    }
}
