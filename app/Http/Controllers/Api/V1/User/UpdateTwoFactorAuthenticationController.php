<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\TwoFactorRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UpdateTwoFactorAuthenticationController extends Controller
{
    public function __invoke(TwoFactorRequest $request): JsonResponse
    {
        try {
            $user = User::findOrFail(auth()->id());

            $user->update(['enabled_two_factor' => $request->enabled_two_factor]);

            Auth::guard('web')->logoutOtherDevices($request->current_password);

            $message = $user->enabled_two_factor ? 'Enable Two Factor Authentication successfully, Please login.' : 'Disable Two Factor Authentication successfully.';

            return response()->json(['message' => $message]);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
