<?php

namespace App\Http\Requests\User;

use App\Rules\RecaptchaRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateProfileInformationRequest extends FormRequest
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
        $rules = [
            'display_name' => ['required','string'],
            'headline' => ['nullable','string','max:255'],
            'about_me' => ['nullable','string'],
            'facebook_url' => ['nullable','url'],
            'twitter_url' => ['nullable','url'],
            'instagram_url' => ['nullable','url'],
            'pinterest_url' => ['nullable','url'],
            'youtube_url' => ['nullable','url'],
            'github_url' => ['nullable','url'],
            'personal_website_url' => ['nullable','url'],
            'captcha_token' => ['required', new RecaptchaRule()],
        ];

        if ($this->hasFile('avatar')) {

            $rules['avatar'] = ['required', 'image', 'mimes:png,jpg,jpeg', 'max:1500'];
        } else {

            $rules['avatar'] = ['nullable'];
        }

        return $rules;
    }
}
