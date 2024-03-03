<?php

namespace App\Http\Requests\Admin\Catalogues;

use App\Rules\RecaptchaRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubcategoryRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', Rule::unique('subcategories', 'name')],
            'description' => ['required', 'string'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:1500'],
            'status' => ['required', Rule::in(['true', 'false', true, false])],
            'captcha_token' => ['required', new RecaptchaRule()],
        ];

        $route = $this->route();

        if ($route && in_array($this->method(), ['PUT', 'PATCH'])) {
            $subcategory = $route->parameter('subcategory');
            $rules['name'] = ['required', 'string', 'max:255', Rule::unique('subcategories', 'name')->ignore($subcategory)];

            if ($this->hasFile('image')) {

                $rules['image'] = ['required', 'image', 'mimes:png,jpg,jpeg', 'max:1500'];
            } else {

                $rules['image'] = ['nullable'];
            }
        }

        return $rules;
    }
}
