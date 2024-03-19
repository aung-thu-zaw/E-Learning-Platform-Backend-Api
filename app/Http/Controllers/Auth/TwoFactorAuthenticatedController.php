<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\Auth\TwoFactorCode;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TwoFactorAuthenticatedController extends Controller
{
    public function verifyOTP(Request $request): JsonResponse|RedirectResponse
    {
        try {
            $request->validate(["two_factor_code" => "required","numeric",Rule::exists("users", "two_factor_code")]);

            $user = User::findOrFail(auth()->id());

            if ($request->two_factor_code === $user->two_factor_code && $user->two_factor_expires_at !== null && $user->two_factor_expires_at->lt(now())) {

                return response()->json([
                    "errors" => ["two_factor_code" => "The two-factor code has expired. Please resend a new code."]
                ], 422);
            } elseif ($request->two_factor_code === $user->two_factor_code) {

                $user->resetTwoFactorCode();

                return response()->json(["message" => "Two-factor code has been verified successfully."]);
            } else {

                return response()->json([
                    "errors" => ["two_factor_code" => "The two-factor code you have entered does not match."]
                ], 422);
            }
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function resendOTP(): JsonResponse
    {
        try {
            $user = User::findOrFail(auth()->id());

            $user->generateTwoFactorCode();

            $user->notify(new TwoFactorCode());

            return response()->json(["status" => "A new two-factor code has been sent to your email address."]);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

}
