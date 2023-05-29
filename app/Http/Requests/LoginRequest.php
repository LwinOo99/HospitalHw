<?php

namespace App\Http\Requests;

use App\Rules\PasswordRule1;
use App\Rules\UsernameRule1;
use App\Rules\UsernameRule2;
use App\Rules\UsernameRule3;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class LoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {   
        Log::info("checking username and password format.");
        
        return [
                "username" => ['required','between:4,12', new UsernameRule1() ,new UsernameRule2(), new UsernameRule3()],
                "password" => ['required','between:8,12',new PasswordRule1()]
        ];
    }
}
