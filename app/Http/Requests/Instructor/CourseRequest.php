<?php

namespace App\Http\Requests\Instructor;

use App\Rules\RecaptchaRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CourseRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255', Rule::unique('courses', 'title')],
            'course_description' => ['required', 'string'],
            'project_description' => ['nullable', 'string'],
            'thumbnail' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:1500'],
            'level' => ['required', 'string', Rule::in(['beginner', 'intermediate', 'advanced', 'all_levels'])],
            'language' => ['required', 'string', Rule::in(['english', 'myanmar', 'arabic', 'spanish', 'french'])],
            'status' => ['required', 'string', Rule::in(['draft', 'pending'])],
            'tags' => ['nullable', 'array'],
            'resources' => ['nullable', 'array'],
            'videos' => ['required', 'array'],
            'captcha_token' => ['required', new RecaptchaRule()],
        ];

        $route = $this->route();

        if ($route && in_array($this->method(), ['PUT', 'PATCH'])) {
            $course = $route->parameter('course');
            $rules['title'] = ['required', 'string', 'max:255', Rule::unique('courses', 'title')->ignore($course)];

            if ($this->hasFile('thumbnail')) {

                $rules['thumbnail'] = ['required', 'image', 'mimes:png,jpg,jpeg', 'max:1500'];
            } else {

                $rules['thumbnail'] = ['nullable'];
            }
        }

        return $rules;
    }
}
