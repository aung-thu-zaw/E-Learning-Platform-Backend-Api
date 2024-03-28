<?php

namespace App\Http\Controllers\Api\V1\ELearning;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\Section;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class GetVideoController extends Controller
{
    public function introVideo(string $introVideoFileName): JsonResponse|BinaryFileResponse
    {
        try {
            if (Storage::disk('public')->exists("courses/intro-videos/$introVideoFileName")) {

                $filePath = Storage::disk('public')->path("courses/intro-videos/$introVideoFileName");

                return response()->file($filePath, [
                    'Content-Type' => 'video/mp4',
                    'Content-Disposition' => 'inline',
                ]);
            } else {
                abort(404);
            }
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function lessonVideo(Course $course, Section $section, Lesson $lesson): JsonResponse|BinaryFileResponse
    {
        $enrollment = Enrollment::where("user_id", auth()->id())->where("course_id", $course->id)->latest()->first();

        if($enrollment) {

            $enrollment->update(["last_watched_lesson_uuid" => $lesson->uuid]);
        }

        try {
            if (!$course->sections->contains($section)) {
                abort(404, 'Section not found in the provided course.');
            }

            if (!$section->lessons->contains($lesson)) {
                abort(404, 'Lesson not found in the provided section.');
            }

            if (Storage::disk('public')->exists("courses/lessons/{$lesson->video_file_name}")) {
                $filePath = Storage::disk('public')->path("courses/lessons/{$lesson->video_file_name}");

                return response()->file($filePath, [
                    'Content-Type' => 'video/mp4',
                    'Content-Disposition' => 'inline',
                ]);
            } else {
                abort(404, 'Video file not found for the lesson.');
            }
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
