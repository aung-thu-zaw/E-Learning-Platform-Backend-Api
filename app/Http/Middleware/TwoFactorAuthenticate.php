<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TwoFactorAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response|JsonResponse
    {
        if (auth()->check()) {

            $user = User::findOrFail(auth()->id());

            if ($user->enabled_two_factor) {

                if ($user->two_factor_code && $user->two_factor_expires_at !== null && $user->two_factor_expires_at->lt(now())) {

                    $user->resetTwoFactorCode();

                    Auth::guard('web')->logout();

                    return response()->json(['message' => 'The two-factor code has expired. Please login again.']);
                }
            }
        }

        return $next($request);
    }
}
