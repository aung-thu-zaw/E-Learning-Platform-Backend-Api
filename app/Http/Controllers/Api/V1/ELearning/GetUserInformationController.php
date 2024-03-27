<?php

namespace App\Http\Controllers\Api\V1\ELearning;

use App\Http\Controllers\Controller;
use App\Http\Resources\ELearning\UserInformationResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetUserInformationController extends Controller
{
    public function __invoke(User $user): JsonResponse|UserInformationResource
    {
        try {
            $user->load(['instructorCourses.instructor','instructorCourses.sections.lessons','instructorCourses.enrollments','instructorCourses.savedByUsers','followers','followings']);

            return new UserInformationResource($user);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
