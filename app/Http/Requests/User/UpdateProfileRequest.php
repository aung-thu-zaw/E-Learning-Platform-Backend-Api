<?php

namespace App\Http\Requests\User;

use App\Models\User;
use App\Rules\RecaptchaRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'regex:/^[a-z]+(?:-[a-z]+)*$/',Rule::unique("users", "username")->ignore(auth()->user())],
            'profile_private' => ['required', 'boolean'],
            'remove_from_search' => ['required', 'boolean'],
            'captcha_token' => ['required', new RecaptchaRule()],
        ];
    }
}
