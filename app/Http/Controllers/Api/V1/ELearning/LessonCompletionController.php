<?php

namespace App\Http\Controllers\Api\V1\ELearning;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class LessonCompletionController extends Controller
{
    public function markAsComplete(Lesson $lesson): JsonResponse
    {
        try {
            $user = User::findOrFail(auth()->id());

            if ($user->completedLessons()->where('lesson_id', $lesson->id)->exists()) {
                return response()->json(["message" => "Lesson is already marked as completed."], 400);
            }

            if ($lesson->section) {
                $course = $lesson->section->course;

                if ($course) {
                    $enrollment = Enrollment::where('user_id', $user->id)
                        ->where('course_id', $course->id)
                        ->firstOrFail();

                    $user->completedLessons()->attach($lesson->id, ['enrollment_id' => $enrollment->id]);

                    return response()->json(["message" => "Lesson marked as completed successfully."]);
                }
            } else {
                return response()->json(["message" => "Lesson does not belong to any section."], 400);
            }
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
        return response()->json(["message" => "An unexpected error occurred."], 500);
    }

    public function unmarkAsComplete(Lesson $lesson): JsonResponse
    {
        try {
            $user = User::findOrFail(auth()->id());

            $user->completedLessons()->detach($lesson->id);

            return response()->json(["message" => "Lesson unmarked as completed successfully."]);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
