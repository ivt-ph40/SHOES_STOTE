<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category_name' => 'bail|required|string|min:3|max:10|unique:categories',
        ];
    }

    public function messages(){
        return[
            //input_name.rule_name
            'category_name.unique' => 'The category_name has already been taken.',
        ];
    }
}
