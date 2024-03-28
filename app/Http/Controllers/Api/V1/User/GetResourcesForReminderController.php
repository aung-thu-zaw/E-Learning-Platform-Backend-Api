<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class GetResourcesForReminderController extends Controller
{
    public function __invoke(): JsonResponse
    {
        try {
            $user = User::findOrFail(auth()->id());

            $enrolledCourses = $user->enrolledCourses()->select('courses.id', 'courses.title')->get();

            return response()->json($enrolledCourses);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
