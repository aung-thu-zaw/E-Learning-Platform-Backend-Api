<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ChangeEmailAddressRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChangeEmailAddressController extends Controller
{
    public function __invoke(ChangeEmailAddressRequest $request): JsonResponse
    {
        try {
            $user = User::findOrFail(auth()->id());

            $user->update(['email' => $request->email,'email_verified_at' => null]);

            $user->sendEmailVerificationNotification();

            return response()->json(['message' => 'Email change verification link sent successfully.']);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
