<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class SocialAuthController extends Controller
{
    public function redirect(string $service): RedirectResponse
    {
        return Socialite::driver($service)->redirect();
    }

    public function callback(string $service): JsonResponse|RedirectResponse
    {
        try {
            $serviceUser = Socialite::driver($service)->stateless()->user();
        } catch (InvalidStateException $e) {
            return redirect(env("FRONTEND_URL").'?error=Unable to login using '.$service.' please try again.');
        }

        if(in_array($service, ["google","facebook"])) {

            return $this->handleAuthenticate($serviceUser, $service);
        } else {

            return response()->json(['error' => 'Unsupported service'], 400);
        }
    }

    private function handleAuthenticate($serviceUser, $serviceProvider): RedirectResponse
    {
        $user = User::where('provider', $serviceProvider)
                    ->where('provider_id', $serviceUser->getId())
                    ->first();

        if (!$user) {
            $user = $this->createUserFromServiceUser($serviceUser, $serviceProvider);
        }

        Auth::login($user);

        return redirect(env("FRONTEND_URL"));

    }

    private function createUserFromServiceUser($serviceUser, $serviceProvider): User
    {
        $newUser = User::create([
            'provider' => $serviceProvider,
            'provider_id' => $serviceUser->getId(),
            'display_name' => $serviceUser->getName(),
            'email' => $serviceUser->getEmail(),
            'avatar' => $serviceUser->getAvatar(),
            'email_verified_at' => now(),
        ]);

        event(new Registered($newUser));

        return $newUser;
    }
}
