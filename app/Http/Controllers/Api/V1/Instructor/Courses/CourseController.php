<?php

namespace App\Http\Controllers\Api\V1\Instructor\Courses;

use App\Actions\Instructor\Courses\CreateCourseAction;
use App\Actions\Instructor\Courses\UpdateCourseAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Instructor\CourseRequest;
use App\Http\Resources\Instructor\CourseResource;
use App\Models\Course;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CourseController extends Controller
{
    public function index(): JsonResponse|AnonymousResourceCollection
    {
        try {
            $courses = Course::with(['category', 'subcategory'])
                ->where('instructor_id', auth()->id())
                ->orderBy('id', 'desc')
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
