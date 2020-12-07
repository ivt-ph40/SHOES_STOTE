<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //định nghĩa các rule
            'first_name' => 'required|min:3|max:10',
            'last_name' => 'required|min:3|max:10',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|numeric|min:3',
        ];
    }

    public function messages(){
        return[
            //input_name.rule_name
            'first_name.required' => 'The name field is required.',
            'first_name.min' => 'The name must be at least 3 characters.',
            'first_name.max' => 'The name may not be greater than 10 characters.',
            'last_name.required' => 'The name field is required.',
            'last_name.min' => 'The name must be at least 3 characters.',
            'last_name.max' => 'The name may not be greater than 10 characters.',
            'email.email' => 'The email  must be a valid email address.',
            'email.required' => 'The email field is required',
            'email.unique' => 'The email has already been taken.',
            'password.required' => 'The password field is required.',
            'password.numeric' => 'The email must be a number.',
            'password.min' => 'The password must be at least 3 characters.',
        ];
    }
}
