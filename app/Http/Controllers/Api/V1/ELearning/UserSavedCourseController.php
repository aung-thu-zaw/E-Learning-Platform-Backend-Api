<?php

namespace App\Http\Controllers\Api\V1\ELearning;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserSavedCourseController extends Controller
{
    public function saveCourse(Course $course): JsonResponse
    {
        try {
            $user = User::findOrFail(auth()->id());

            $user->savedCourses()->attach($course->id);

            return response()->json(['message' => 'Course saved to list successfully'], 200);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function removeSavedCourse(Course $course): JsonResponse
    {
        try {
            $user = User::findOrFail(auth()->id());

            $user->savedCourses()->detach($course->id);

            return response()->json(['message' => 'Course removed from saved list.'], 200);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
