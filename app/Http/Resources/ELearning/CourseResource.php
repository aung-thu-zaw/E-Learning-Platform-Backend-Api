<?php

namespace App\Http\Resources\ELearning;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;

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

        $totalLessonCount = 0;
        foreach ($this->resource->sections as $section) {
            $totalLessonCount += $section->lessons->count();
        }

        $includeSections = Route::currentRouteName() === 'courses.show';

        $data = [
            'id' => $this->resource->id,
            'uuid' => $this->resource->uuid,
            'instructor_id' => $this->resource->instructor_id,
            'category_id' => $this->resource->category_id,
            'subcategory_id' => $this->resource->subcategory_id,
            'intro_video_path' => $this->resource->intro_video_path,
            'thumbnail' => $this->resource->thumbnail,
            'title' => $this->resource->title,
            'slug' => $this->resource->slug,
            'course_description' => $this->resource->course_description,
            'project_description' => $this->resource->project_description,
            'level' => $this->resource->level,
            'status' => $this->resource->status,
            'language' => $this->resource->language,
            'published_at' => $this->resource->published_at,
            'total_lesson' => $totalLessonCount,
            'duration' => sprintf('%02d h %02d min', floor($this->resource->duration_seconds / 3600), floor(($this->resource->duration_seconds % 3600) / 60)),
            'is_saved' => $this->resource->savedByUsers->contains(auth()->id()),
            'is_enrolled' => $enrollment ? true : false,
            'total_student' => $this->resource->enrollments->count(),
            'instructor' => [
                'username' => $this->resource->instructor->username,
                'name' => $this->resource->instructor->display_name,
                'avatar' => $this->resource->instructor->avatar,
            ],
        ];

        if ($includeSections) {
            $data['sections'] = $this->resource->sections->map(function ($section) {
                $sectionDurationSeconds = $section->lessons->sum('duration_seconds');
                $sectionHours = floor($sectionDurationSeconds / 3600);
                $sectionMinutes = floor(($sectionDurationSeconds % 3600) / 60);

                if ($sectionHours > 0) {
                    $sectionDuration = sprintf('%02d h %02d min', $sectionHours, $sectionMinutes);
                } else {
                    $sectionDuration = sprintf('%02d min', $sectionMinutes);
                }

                return [
                    'title' => $section->title,
                    'slug' => $section->slug,
                    'duration' => $sectionDuration,
                    'total_completed_lessons_count' => $section->lessons->where('is_completed', true)->count(),
                    'lessons' => $section->lessons->map(function ($lesson) {
                        $hours = floor($lesson->duration_seconds / 3600);
                        $minutes = floor(($lesson->duration_seconds % 3600) / 60);

                        if ($hours > 0) {
                            $duration = sprintf('%02d h %02d min', $hours, $minutes);
                        } else {
                            $duration = sprintf('%02d min', $minutes);
                        }

                        return [
                            'title' => $lesson->title,
                            'slug' => $lesson->slug,
                            'video_path' => $lesson->video_path,
                            'duration' => $duration,
                            'description' => $lesson->description,
                            'is_completed' => $lesson->is_completed,
                        ];
                    }),
                ];
            });
        }

        $data['enrollment'] = $enrollment
            ? [
                'id' => $enrollment->id,
                'enrolled_at' => $enrollment->enrolled_at,
                'completed_at' => $enrollment->completed_at,
                'progress' => $enrollment->progress,
            ]
            : null;

        return $data;
    }
}
