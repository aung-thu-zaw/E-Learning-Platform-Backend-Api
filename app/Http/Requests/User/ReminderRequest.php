<?php

namespace App\Http\Requests\User;

use App\Rules\RecaptchaRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReminderRequest extends FormRequest
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
            'course_id' => ['required', 'numeric', Rule::exists('courses', 'id')],
            'message' => ['required', 'string'],
            'frequency' => ['required', 'string', Rule::in(['once', 'weekly', 'daily'])],
            'date' => ['nullable', 'date'],
            'time' => ['required'],
            'days' => ['nullable', 'array', Rule::in(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'])],
            'google_calendar_synced' => ['required', 'boolean'],
            'captcha_token' => ['required', new RecaptchaRule()],
        ];
    }
}
