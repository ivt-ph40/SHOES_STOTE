<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            //định nghĩa các rule
            'brand_name' => 'bail|required|string|min:3|max:10|unique:brands',
        ];
    }

    public function messages(){
        return[
            //input_name.rule_name
            'brand_name.min' => 'The brand_name must be at least 3 characters.',
            'brand_name.max' => 'The brand_name may not be greater than 10 characters.',
            'brand_name.required' => 'The brand_name field is required',
            'brand_name.unique' => 'The brand_name has already been taken.',
        ];
    }
}
