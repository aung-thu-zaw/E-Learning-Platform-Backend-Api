<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RemovedFromEnrollmentCourseController extends Controller
{
    public function __invoke(Course $course): JsonResponse
    {
        try {
            $enrollment = Enrollment::where("course_id", $course->id)
                ->where('user_id', auth()->id())
                ->first();

            if (!$enrollment) {
                return response()->json(['message' => 'Enrollment does not exist for this course'], 404);
            }

            $enrollment->delete();

            return response()->json(['message' => 'Successfully unenrolled from the course'], 200);


        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
