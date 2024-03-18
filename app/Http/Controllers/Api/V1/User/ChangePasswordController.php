<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ChangePasswordController extends Controller
{
    public function __invoke(ChangePasswordRequest $request): JsonResponse
    {
        try {
            $user = User::findOrFail(auth()->id());

            $user->update(['password' => Hash::make($request->password)]);

            return response()->json(["message" => "Password updated successfully."]);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
