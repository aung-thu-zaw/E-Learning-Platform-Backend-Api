<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\RecaptchaRule;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Laravolt\Avatar\Avatar;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'display_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'captcha_token' => ['required', new RecaptchaRule()],
        ]);

        $user = User::create([
            'display_name' => $request->display_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->referralCode()->create(['code' => substr(md5(uniqid('', true)), 0, 8)]);

        $colors = ['#f44336', '#E91E63', '#9C27B0', '#673AB7', '#3F51B5', '#2196F3', '#03A9F4', '#00BCD4', '#009688', '#4CAF50', '#8BC34A', '#CDDC39', '#FFC107', '#FF9800', '#FF5722'];

        if (! is_dir(storage_path('app/public/avatars'))) {
            mkdir(storage_path('app/public/avatars'), 0775, true);
        }

        $avatar = new Avatar();
        $avatar->create($request->display_name)
            ->setBackground($colors[array_rand($colors, 1)])
            ->setBorder(0, 'background')
            ->setFontSize(36)
            ->save(storage_path("app/public/avatars/default-avatar-$user->id.png"));

        event(new Registered($user));

        Auth::login($user);

        return response()->json($user);
    }
}
