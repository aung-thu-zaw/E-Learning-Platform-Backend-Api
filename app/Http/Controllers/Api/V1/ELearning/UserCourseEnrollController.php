<?php

namespace App\Http\Controllers\Api\V1\ELearning;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseMetric;
use App\Models\CourseWatchTime;
use App\Models\Enrollment;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class UserCourseEnrollController extends Controller
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

            CourseMetric::updateOrCreate(
                ['course_id' => $course->id],
                ['enrollments' => DB::raw('enrollments + 1')]
            );

            CourseWatchTime::firstOrCreate(['course_id' => $course->id]);

            return response()->json(['message' => 'Enrollment successful.']);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
