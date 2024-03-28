<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\JsonResponse;

class CourseCompletionController extends Controller
{
    public function markAsComplete(Course $course): JsonResponse
    {
        try {
            $enrollment = Enrollment::where('course_id', $course->id)->where('user_id', auth()->id())->first();

            if (! $enrollment) {
                return response()->json(['message' => 'Enrollment does not exist for this course'], 404);
            }

            $enrollment->update(['completed_at' => now(), 'progress' => 100]);

            return response()->json(['message' => 'Course marked as complete'], 200);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function unmarkAsComplete(Course $course): JsonResponse
    {
        try {
            $enrollment = Enrollment::where('course_id', $course->id)->where('user_id', auth()->id())->first();

            if (! $enrollment) {
                return response()->json(['message' => 'Enrollment does not exist for this course'], 404);
            }

            $enrollment->update(['completed_at' => null, 'progress' => 0]);

            return response()->json(['message' => 'Course unmarked as complete'], 200);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
