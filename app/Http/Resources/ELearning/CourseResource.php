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
        $enrollment = $this->resource->enrollments->where('user_id', auth()->id())->first();

        return [
            'id' => $this->resource->id,
            'uuid' => $this->resource->uuid,
            'instructor_id' => $this->resource->instructor_id,
            'category_id' => $this->resource->category_id,
            'subcategory_id' => $this->resource->subcategory_id,
            'thumbnail' => $this->resource->thumbnail,
            'title' => $this->resource->title,
            'slug' => $this->resource->slug,
            'course_description' => $this->resource->course_description,
            'project_description' => $this->resource->project_description,
            'level' => $this->resource->level,
            'status' => $this->resource->status,
            'language' => $this->resource->language,
            'published_at' => $this->resource->published_at,
            'total_lesson' => $this->resource->lessons->count(),
            'duration' => sprintf('%02d h %02d min', floor($this->resource->duration_seconds / 3600), floor(($this->resource->duration_seconds % 3600) / 60)),
            'is_saved' => $this->resource->savedByUsers->contains(auth()->id()),
            'instructor' => [
                'username' => $this->resource->instructor->username,
                'name' => $this->resource->instructor->display_name,
                'avatar' => $this->resource->instructor->avatar,
            ],
            'enrollment' => $enrollment ? [
                'id' => $enrollment->id,
                'enrolled_at' => $enrollment->enrolled_at,
                'completed_at' => $enrollment->completed_at,
                'progress' => $enrollment->progress,
            ] : null
        ];
    }
}
