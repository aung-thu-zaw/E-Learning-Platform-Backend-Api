<?php

namespace App\Http\Controllers\Api\V1\ELearning;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Lesson;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetLessonMetaDataController extends Controller
{
    public function __invoke(Lesson $lesson): JsonResponse
    {
        try {
            $lessonMetadata = [
                'id' => $lesson->id,
                'section_id' => $lesson->section_id,
                'uuid' => $lesson->uuid,
                'title' => $lesson->title,
                'video_file_name' => $lesson->video_file_name,
                'duration_seconds' => $lesson->duration_seconds,
                'description' => $lesson->description,
                'is_completed' => auth()->user() ? auth()->user()->completedLessons->contains($lesson->id) : false,
            ];

            return response()->json($lessonMetadata);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
