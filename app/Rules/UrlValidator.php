<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UrlValidator implements Rule
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
        return $this->validUrl($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The url does not point to a valid resource';
    }

    private function validUrl($url)
    {
        $headers = @get_headers($url);
        if(!$headers || $headers[0] == 'HTTP/1.1 404 Not Found') {
            return false;
        }
        return true;
    }
}
