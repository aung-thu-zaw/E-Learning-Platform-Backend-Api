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
            'id' => $this->id,
            'section_id' => $this->section_id,
            'thumbnail' => $this->thumbnail,
            'title' => $this->title,
            'slug' => $this->slug,
            'level' => $this->level,
            'type' => $this->type,
            'status' => $this->status,
            'instructor' => [
                'name' => $this->instructor->display_name,
                'avatar' => $this->instructor->avatar,
            ],
            'category' => [
                'name' => $this->category->name,
            ],
            'subcategory' => [
                'name' => $this->subcategory->name,
            ],
        ];
    }
}
