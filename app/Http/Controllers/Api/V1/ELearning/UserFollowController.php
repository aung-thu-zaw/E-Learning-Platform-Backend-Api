<?php

namespace App\Http\Controllers\Api\V1\ELearning;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserFollowController extends Controller
{
    public function follow(User $user): JsonResponse
    {
        try {
            $authenticatedUser = User::findOrFail(auth()->id());

            $authenticatedUser->follow($user);

            return response()->json(['message' => 'User followed successfully.'], 200);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function unfollow(User $user): JsonResponse
    {
        try {
            $authenticatedUser = User::findOrFail(auth()->id());

            $authenticatedUser->unfollow($user);

            return response()->json(['message' => 'User unfollowed successfully.'], 200);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
