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
            'id' => $this->id,
            'thumbnail' => $this->thumbnail,
            'title' => $this->title,
            'slug' => $this->slug,
            'level' => $this->level,
            'status' => $this->status,
            'category' => [
                'name' => $this->category->name,
            ],
            'subcategory' => [
                'name' => $this->subcategory->name,
            ],
        ];
    }
}
