<?php

namespace App\Http\Controllers\Api\V1\ELearning;

use App\Http\Controllers\Controller;
use App\Http\Resources\ELearning\CourseResource;
use App\Models\Course;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BrowseCourseController extends Controller
{
    public function index(int $subcategoryId): AnonymousResourceCollection|JsonResponse
    {
        try {
            $courses = Course::filter(request(['search', 'tag', 'sort', 'level', 'duration']))
                ->with(['instructor', 'sections.lessons', 'enrollments', 'tags', 'savedByUsers'])
                ->where('subcategory_id', $subcategoryId)
                ->where('status', 'published')
                ->orderBy('id', 'desc')
                ->paginate(20)
                ->appends(request()->query());

            return CourseResource::collection($courses);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
