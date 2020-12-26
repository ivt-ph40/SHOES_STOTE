<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_name' => 'bail|string|min:3|max:10|unique:products',
            'product_code' => 'bail|string|min:3|max:200',
        ];
    }

    public function messages(){
        return[
            //input_name.rule_name
            'product_name.min' => 'The product_name must be at least 3 characters.',
            'product_name.max' => 'The product_name may not be greater than 10 characters.',
            'product_name.required' => 'The product_name field is required',
            'product_code.min' => 'The product_code must be at least 3 characters.',
            'product_code.max' => 'The product_code may not be greater than 10 characters.',
            'product_code.required' => 'The product_code field is required',
            'product_code.unique' => 'The product_code has already been taken.',
        ];
    }
}
