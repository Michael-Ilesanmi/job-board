<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
    * Indicates if the validator should stop on the first rule failure.
    *
    * @var bool
    */
    protected $stopOnFirstFailure = true;


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        if ($this->routeIs('login')) {
            return [
                "email"=>"required|email",
                "password"=>"required|min:6|max:50"
            ];
        }
        if ($this->routeIs('register')) {
            return [
                "first_name"=>"required",
                "last_name"=>"required",
                "email"=>"required|email",
                "password"=>"min:6|required_with:password_confirm|same:password_confirm",
                "password_confirm"=>"required|min:6"
            ];
        }
        return [
            //
        ];
    }
}
