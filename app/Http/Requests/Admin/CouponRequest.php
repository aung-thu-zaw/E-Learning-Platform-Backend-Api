<?php

namespace App\Http\Requests\Admin;

use App\Rules\RecaptchaRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CouponRequest extends FormRequest
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
            'code' => ['required', 'string', 'max:255', Rule::unique('coupons', 'code')],
            "description" => ["required","string","max:255"],
            'type' => ['required', 'string', Rule::in(['percentage', 'fixed_amount'])],
            'value' => ['required'],
            'max_uses' => ['nullable',"numeric"],
            'expiry_date' => ['nullable', 'date'],
            'free_trial_days' => ['nullable',"numeric"],
            'is_redeemable' => ['required', Rule::in(['true', 'false',true,false])],
            'captcha_token' => [new RecaptchaRule()],
        ];

        $route = $this->route();

        if ($route && in_array($this->method(), ['PUT', 'PATCH'])) {
            $coupon = $route->parameter('coupon');
            $rules['code'] = ['required', 'string', 'max:255', Rule::unique('coupons', 'code')->ignore($coupon)];

        }

        return $rules;
    }
}
