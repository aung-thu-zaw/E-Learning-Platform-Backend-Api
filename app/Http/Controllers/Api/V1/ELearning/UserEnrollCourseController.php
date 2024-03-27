<?php

namespace App\Http\Controllers\Api\V1\ELearning;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserEnrollCourseController extends Controller
{
    public function __invoke(Course $course): JsonResponse
    {
        try {
            Enrollment::create([
                'user_id' => auth()->id(),
                'course_id' => $course->id,
                'enrolled_at' => now(),
                'progress' => 0,
            ]);

            // auth()->user()->notify(new EnrollmentSuccessNotification($course));

            return response()->json(["message" => "Enrollment successful."]);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
