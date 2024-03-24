<?php

namespace App\Http\Controllers\Api\V1\ELearning;

use App\Http\Controllers\Controller;
use App\Http\Resources\ELearning\CourseResource;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\DB;

class GetRecommendedCourseForUserInterest extends Controller
{
    public function __invoke(): JsonResponse|AnonymousResourceCollection
    {
        try {
            $user = User::findOrFail(auth()->id());

            $userInterestIds = $user->interests()->pluck('id');

            $courses = Course::with(['instructor', 'lessons','enrollments','savedByUsers'])
            ->whereHas('tags', function ($query) use ($userInterestIds) {
                $query->whereIn('id', $userInterestIds);
            })
            ->where('status', 'published')
            ->orderBy(DB::raw('(SELECT COALESCE(SUM(views), 0) + COALESCE(SUM(enrollments), 0) FROM course_metrics WHERE course_metrics.course_id = courses.id)'), 'desc')
            ->take(10)
            ->get();

            return CourseResource::collection($courses);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
