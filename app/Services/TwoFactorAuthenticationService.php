<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class TwoFactorAuthenticationService
{
    public function enableTwoFactorAuth(): void
    {
        $user = User::findOrFail(auth()->id());

        $user->update([
            "two_factor_secret" => Str::random(32),
            "two_factor_expires_at" => now()->addMinutes(5)
        ]);
    }

    public function generateOTP(string $secretKey): string
    {
        $otp = hash_hmac('sha256', $secretKey, now()->format('YmdH'));

        $otp = substr($otp, 0, 6);

        return $otp;
    }

    public function storeOTPToSession(string $otp): void
    {
        Session::put('otp', $otp);
        Session::put('otp_expires_at', now()->addMinutes(5));
    }

    public function verifyOTP(string $otp): bool
    {
        $storedOTP = Session::get('otp');
        $expiryTime = Session::get('otp_expires_at');

        if ($storedOTP === $otp && now()->lt($expiryTime)) {
            return true;
        }

        return false;
    }

    public function clearOTPFromSession(): void
    {
        Session::forget('otp');
        Session::forget('otp_expires_at');
    }
}
