<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\ELearning\CourseResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GetEnrolledCourseController extends Controller
{
    public function __invoke(): JsonResponse|AnonymousResourceCollection
    {
        try {
            $user = User::findOrFail(auth()->id());

            $enrolledCourses = $user->enrolledCourses()->with(['instructor', 'lessons','enrollments','savedByUsers'])->paginate(15);

            return CourseResource::collection($enrolledCourses);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
