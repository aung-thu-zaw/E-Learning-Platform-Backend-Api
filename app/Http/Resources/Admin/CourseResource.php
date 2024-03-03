<?php

namespace App\Http\Resources\Admin;

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
            'section_id' => $this->resource->section_id,
            'thumbnail' => $this->resource->thumbnail,
            'title' => $this->resource->title,
            'slug' => $this->resource->slug,
            'level' => $this->resource->level,
            'type' => $this->resource->type,
            'status' => $this->resource->status,
            'instructor' => [
                'name' => $this->resource->instructor->display_name,
                'avatar' => $this->resource->instructor->avatar,
            ],
            'category' => [
                'name' => $this->resource->category->name,
            ],
            'subcategory' => [
                'name' => $this->resource->subcategory->name,
            ],
        ];
    }
}
