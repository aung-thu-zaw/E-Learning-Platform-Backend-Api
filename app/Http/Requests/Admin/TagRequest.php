<?php

namespace App\Http\Requests\Admin;

use App\Rules\RecaptchaRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TagRequest extends FormRequest
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
            'category_id' => ['required', 'numeric', Rule::exists('categories', 'id')],
            'subcategory_id' => ['required', 'numeric', Rule::exists('subcategories', 'id')],
            'name' => ['required', 'string', 'max:255', Rule::unique('tags', 'name')],
            'captcha_token' => ['required', new RecaptchaRule()],
        ];

        $route = $this->route();

        if ($route && in_array($this->method(), ['PUT', 'PATCH'])) {
            $tags = $route->parameter('tag');
            $rules['name'] = ['required', 'string', 'max:255', Rule::unique('tags', 'name')->ignore($tags)];
        }

        return $rules;
    }
}
