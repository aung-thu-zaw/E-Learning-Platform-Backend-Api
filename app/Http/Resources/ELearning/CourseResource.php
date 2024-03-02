<?php

namespace App\Http\Resources\ELearning;

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
            "id" => $this->id,
            "uuid" => $this->uuid,
            "instructor_id" => $this->instructor_id,
            "category_id" => $this->category_id,
            "subcategory_id" => $this->subcategory_id,
            "thumbnail" => $this->thumbnail,
            "title" => $this->title,
            "slug" => $this->slug,
            "course_description" => $this->course_description,
            "project_description" => $this->project_description,
            "level" => $this->level,
            "status" => $this->status,
            "language" => $this->language,
            "published_at" => $this->published_at,
            "duration_seconds" => sprintf('%02d hours %02d minutes', floor($this->duration_seconds / 3600), floor(($this->duration_seconds % 3600) / 60)),
            "instructor" => [
                "name" => $this->instructor->display_name,
                "avatar" => $this->instructor->avatar
            ],
            "total_lesson" => $this->lessons->count(),
        ];
    }
}
