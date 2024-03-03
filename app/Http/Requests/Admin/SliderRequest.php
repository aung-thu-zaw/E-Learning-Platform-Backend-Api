<?php

namespace App\Http\Requests\Admin;

use App\Rules\RecaptchaRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SliderRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255', Rule::unique('sliders', 'title')],
            'description' => ['required', 'string'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:1500'],
            'status' => ['required', Rule::in(['true', 'false', true, false])],
            'button' => ['required', 'string'],
            'url' => ['required', 'url'],
            'captcha_token' => ['required', new RecaptchaRule()],
        ];

        $route = $this->route();

        if ($route && in_array($this->method(), ['PUT', 'PATCH'])) {
            $title = $route->parameter('slider');
            $rules['title'] = ['required', 'string', 'max:255', Rule::unique('sliders', 'title')->ignore($title)];

            if ($this->hasFile('image')) {

                $rules['image'] = ['required', 'image', 'mimes:png,jpg,jpeg', 'max:1500'];
            } else {

                $rules['image'] = ['nullable'];
            }
        }

        return $rules;
    }
}
