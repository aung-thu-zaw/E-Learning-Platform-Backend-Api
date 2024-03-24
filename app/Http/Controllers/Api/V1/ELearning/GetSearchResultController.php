<?php

namespace App\Http\Controllers\Api\V1\ELearning;

use App\Http\Controllers\Controller;
use App\Http\Resources\ELearning\CourseResource;
use App\Http\Resources\ELearning\LearningPathResource;
use App\Models\Course;
use App\Models\LearningPath;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GetSearchResultController extends Controller
{
    public function __invoke(): JsonResponse|AnonymousResourceCollection
    {
        try {
            $searchResultCourses = Course::search(request('query'))
                ->query(function (Builder $builder) {
                    $builder->with(['instructor', 'lessons','enrollments','savedByUsers']);
                })
                ->where('status', 'published')
                ->orderBy('id', 'desc')
                ->paginate(16)
                ->appends(request()->all());

            $searchResultLearningPaths = LearningPath::search(request('query'))
                ->query(function (Builder $builder) {
                    $builder->with(['creator', 'courses','savedByUsers']);
                })
                ->where('status', true)
                ->orderBy('id', 'desc')
                ->paginate(15)
                ->appends(request()->all());

            $courses = CourseResource::collection($searchResultCourses)->response()->getData(true);
            $learningPaths = LearningPathResource::collection($searchResultLearningPaths)->response()->getData(true);

            return response()->json(["courses" => $courses,"learningPaths" => $learningPaths]);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
