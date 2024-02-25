<?php

namespace App\Http\Requests\Admin;

use App\Rules\RecaptchaRule;
use Illuminate\Foundation\Http\FormRequest;

class NavBannerRequest extends FormRequest
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
            'description' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url'],
            'button' => ['required', 'string', 'max:255'],
            'countdown' => ['nullable', 'date'],
            'start_date_time' => ['required', 'date'],
            'end_date_time' => ['required', 'date'],
            'captcha_token' => ['required', new RecaptchaRule()],
        ];
    }
}
