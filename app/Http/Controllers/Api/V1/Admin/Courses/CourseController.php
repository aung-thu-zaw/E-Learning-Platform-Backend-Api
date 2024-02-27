<?php

namespace App\Http\Controllers\Api\V1\Admin\Courses;

use App\Actions\Admin\Courses\CreateCourseAction;
use App\Actions\Admin\Courses\UpdateCourseAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseRequest;
use App\Http\Resources\Admin\CourseResource;
use App\Models\Course;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:courses.view', ['only' => ['index']]);
        $this->middleware('permission:courses.create', ['only' => ['store']]);
        $this->middleware('permission:courses.edit', ['only' => ['show', 'update']]);
        $this->middleware('permission:courses.delete', ['only' => ['destroy']]);
    }

    public function index(): JsonResponse|AnonymousResourceCollection
    {
        try {
            $courses = Course::filterSearch(request('search'))
            ->with(["category","subcategory","instructor"])
                ->orderBy(request('sort', 'id'), request('direction', 'desc'))
                ->paginate(request('per_page', 5))
                ->appends(request()->all());

            return CourseResource::collection($courses);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function store(CourseRequest $request): JsonResponse|CourseResource
    {
        try {
            $course = (new CreateCourseAction())->handle($request->validated());

            return new CourseResource($course);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function show(Course $course): JsonResponse|CourseResource
    {
        try {
            return new CourseResource($course);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function update(CourseRequest $request, Course $course): JsonResponse|CourseResource
    {
        try {
            $course = (new UpdateCourseAction())->handle($request->validated(), $course);

            return new CourseResource($course);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function destroy(Course $course): Response|JsonResponse
    {
        try {
            $course->delete();

            return response()->noContent();
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
