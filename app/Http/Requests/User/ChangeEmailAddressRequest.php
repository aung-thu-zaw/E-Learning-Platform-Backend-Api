<?php

namespace App\Http\Requests\User;

use App\Rules\RecaptchaRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ChangeEmailAddressRequest extends FormRequest
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
            'current_email' => ['required', 'email', Rule::exists('users', 'email')],
            'email' => ['required', 'email', 'confirmed', 'different:current_email', Rule::unique('users', 'email')->ignore(auth()->user())],
            'captcha_token' => ['required', new RecaptchaRule()],
        ];
    }
}
