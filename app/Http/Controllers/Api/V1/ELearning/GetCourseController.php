<?php

namespace App\Http\Controllers\Api\V1\ELearning;

use App\Http\Controllers\Controller;
use App\Http\Resources\ELearning\CourseResource;
use App\Http\Resources\ELearning\CourseResourceWithSectionLessons;
use App\Models\Course;
use Illuminate\Http\JsonResponse;

class GetCourseController extends Controller
{
    public function __invoke(Course $course): JsonResponse|CourseResourceWithSectionLessons
    {
        try {
            $course->load(['instructor', 'sections.lessons', 'enrollments', 'savedByUsers','courseIntroVideo']);

            return new CourseResourceWithSectionLessons($course);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
