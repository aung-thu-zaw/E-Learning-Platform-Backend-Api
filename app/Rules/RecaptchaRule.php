<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;

class RecaptchaRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $endpoint = config('services.google_recaptcha');

        $response = Http::asForm()->post($endpoint['url'], [
            'secret' => $endpoint['secret_key'],
            'response' => $value,
        ])->json();

        // dd($response);

        if ($response['success'] && $response['score'] > 0.5) {
            // dd("it's work");
            return true;
        }

        // dd("it's not work");
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Failed to validate recaptcha.';
    }
}
