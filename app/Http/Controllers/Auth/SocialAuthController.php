<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as ContractsUser;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;
use Symfony\Component\HttpFoundation\RedirectResponse as HttpFoundationRedirectResponse;

class SocialAuthController extends Controller
{
    public function redirect(string $service): HttpFoundationRedirectResponse
    {
        return Socialite::driver($service)->redirect();
    }

    public function callback(string $service): Redirector|RedirectResponse|JsonResponse
    {
        try {
            $serviceUser = Socialite::driver($service)->user();
        } catch (InvalidStateException $e) {
            return redirect(env('FRONTEND_URL').'?error=Unable to login using '.$service.' please try again.');
        }

        if (in_array($service, ['google', 'facebook'])) {

            return $this->handleAuthenticate($serviceUser, $service);
        } else {

            return response()->json(['error' => 'Unsupported service'], 400);
        }
    }

    private function handleAuthenticate(ContractsUser $serviceUser, string $serviceProvider): RedirectResponse|Redirector
    {
        $user = User::where('provider', $serviceProvider)
            ->where('provider_id', $serviceUser->getId())
            ->first();

        if (! $user) {
            $user = $this->createUserFromServiceUser($serviceUser, $serviceProvider);
        }

        Auth::login($user);

        return redirect(env('FRONTEND_URL'));

    }

    private function createUserFromServiceUser(ContractsUser $serviceUser, string $serviceProvider): User
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
