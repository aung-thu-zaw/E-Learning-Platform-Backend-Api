<?php

namespace App\Http\Controllers\Api\V1\ELearning;

use App\Http\Controllers\Controller;
use App\Http\Resources\ELearning\CourseResource;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GetCoursesBasedOnUserInterest extends Controller
{
    public function __invoke(): JsonResponse|AnonymousResourceCollection
    {
        try {
            $user = User::findOrFail(auth()->id());

            $userInterestIds = $user->interests()->pluck('id');

            $courses = Course::with(['instructor', 'sections.lessons', 'enrollments', 'savedByUsers'])->whereHas('tags', function ($query) use ($userInterestIds) {
                $query->whereIn('id', $userInterestIds);
            })
                ->where('status', 'published')
                ->paginate(9);

            return CourseResource::collection($courses);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
