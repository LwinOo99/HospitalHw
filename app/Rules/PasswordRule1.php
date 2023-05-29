<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Log;

class PasswordRule1 implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {  
        Log::channel("customlog")->info("checking password rule1.");
        if(!ctype_alnum($value)){
            $fail("$attribute must not contain special character");
        }
    }
}
