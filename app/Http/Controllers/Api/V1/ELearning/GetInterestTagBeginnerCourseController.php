<?php

namespace App\Http\Controllers\Api\V1\ELearning;

use App\Http\Controllers\Controller;
use App\Http\Resources\ELearning\CourseResource;
use App\Models\Course;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class GetInterestTagBeginnerCourseController extends Controller
{
    public function __invoke(int $tagId): JsonResponse|AnonymousResourceCollection
    {
        try {
            $courses = Course::with(['instructor', 'lessons'])
            ->whereHas('tags', function ($query) use ($tagId) {
                $query->where('id', $tagId)->where("level", "beginner");
            })
            ->orderBy(DB::raw('(SELECT COALESCE(SUM(views), 0) + COALESCE(SUM(enrollments), 0) FROM course_metrics WHERE course_metrics.course_id = courses.id)'), 'desc')
            ->take(3)
            ->get();

            return CourseResource::collection($courses);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
