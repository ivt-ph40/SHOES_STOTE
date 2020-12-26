<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|numeric|min:3',
        ];
    }

    public function messages(){
        return[
            'email.email' => 'The email  must be a valid email address.',
            'email.required' => 'The email field is required',
            'password.required' => 'The password field is required.',
            'password.numeric' => 'The email must be a number.',
            'password.min' => 'The password must be at least 3 characters.',
        ];
    }
}
