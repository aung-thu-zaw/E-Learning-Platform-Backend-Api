<?php

namespace App\Http\Resources\Instructor;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            'thumbnail' => $this->resource->thumbnail,
            'title' => $this->resource->title,
            'slug' => $this->resource->slug,
            'level' => $this->resource->level,
            'status' => $this->resource->status,
            'category' => [
                'name' => $this->resource->category->name,
            ],
            'subcategory' => [
                'name' => $this->resource->subcategory->name,
            ],
        ];
    }
}
