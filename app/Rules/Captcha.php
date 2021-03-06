<?php

namespace App\Rules;

use ReCaptcha\ReCaptcha;
use Illuminate\Contracts\Validation\Rule;

class Captcha implements Rule
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
    public function passes($attribute, $value){
        $captcha = new ReCaptcha('6LeGoaYUAAAAAMqZpFzZx_u40DkGuZ7PgzLHu7HX');
        $response = $captcha->verify($value, $_SERVER['REMOTE_ADDR']);
 
        return $response->isSuccess();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Complete the reCAPTCHA to submit the form.';
    }
}
