<?php

namespace App\Http\Resources\ELearning;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class CourseResourceWithSectionLessons extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        $enrollment = $this->resource->enrollments->where('user_id', auth()->id())->first();

        $totalLessonCount = 0;
        foreach ($this->resource->sections as $section) {
            $totalLessonCount += $section->lessons->count();
        }

        return [
            'id' => $this->resource->id,
            'uuid' => $this->resource->uuid,
            'instructor_id' => $this->resource->instructor_id,
            'category_id' => $this->resource->category_id,
            'subcategory_id' => $this->resource->subcategory_id,
            'intro_video_name' => $this->resource->courseIntroVideo->video_file_name,
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
            'enrollment' => $enrollment
                ? [
                    'id' => $enrollment->id,
                    'enrolled_at' => $enrollment->enrolled_at,
                    'completed_at' => $enrollment->completed_at,
                    'progress' => $enrollment->progress,
                    'last_watched_lesson_uuid' => $enrollment->last_watched_lesson_uuid,
                ]
                : null,
            'sections' => $this->resource->sections->map(function ($section) {
                $sectionDurationSeconds = $section->lessons->sum('duration_seconds');
                $sectionHours = floor($sectionDurationSeconds / 3600);
                $sectionMinutes = floor(($sectionDurationSeconds % 3600) / 60);

                if ($sectionHours > 0) {
                    $sectionDuration = sprintf('%02d h %02d min', $sectionHours, $sectionMinutes);
                } else {
                    $sectionDuration = sprintf('%02d min', $sectionMinutes);
                }

                $totalCompletedLessonsCount = $section->lessons->sum(function ($lesson) {
                    return $lesson->completedLessonsByUser()
                        ->where('user_id', auth()->id())
                        ->count();
                });


                return [
                    'id' => $section->id,
                    'title' => $section->title,
                    'slug' => $section->slug,
                    'duration' => $sectionDuration,
                    'total_completed_lessons_count' => $totalCompletedLessonsCount,
                    'lessons' => $section->lessons->map(function ($lesson) {
                        $hours = floor($lesson->duration_seconds / 3600);
                        $minutes = floor(($lesson->duration_seconds % 3600) / 60);

                        if ($hours > 0) {
                            $duration = sprintf('%02d h %02d min', $hours, $minutes);
                        } else {
                            $duration = sprintf('%02d min', $minutes);
                        }

                        return [
                            'id' => $lesson->id,
                            'section_id' => $lesson->section_id,
                            'title' => $lesson->title,
                            'uuid' => $lesson->uuid,
                            'video_file_name' => $lesson->video_file_name,
                            'duration' => $duration,
                            'description' => $lesson->description,
                            'is_completed' => auth()->user() ? auth()->user()->completedLessons->contains($lesson->id) : false,
                        ];
                    }),
                ];
            }),
        ];
    }
}
