<?php

namespace App\Http\Controllers\Api\V1\ELearning;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function getLessonMetaData(Lesson $lesson): JsonResponse
    {
        try {
            $lessonMetadata = [
                'section_id' => $lesson->section_id,
                'uuid' => $lesson->uuid,
                'title' => $lesson->title,
                'video_file_name' => $lesson->video_file_name,
                'duration_seconds' => $lesson->duration_seconds,
                'description' => $lesson->description,
                'is_completed' => $lesson->is_completed,
            ];

            return response()->json($lessonMetadata);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

}
