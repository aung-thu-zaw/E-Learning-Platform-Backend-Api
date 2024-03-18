<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UpdateProfileController extends Controller
{
    public function __invoke(UpdateProfileRequest $request): JsonResponse
    {
        try {
            $user = User::findOrFail(auth()->id());

            $user->update([
                "username" => $request->username,
                "profile_private" => $request->profile_private,
                "remove_from_search" => $request->remove_from_search,
            ]);

            return response()->json(["message" => "Profile updated successfully."]);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
