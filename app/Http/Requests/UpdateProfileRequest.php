<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'first_name' => 'required|min:1|max:100',
            'last_name' => 'required|min:1|max:100',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:10',
            'street' => 'required|min:3|max:255',
            'ward' => 'required|min:3|max:255',
            'district' => 'required|min:3|max:255',
            'city' => 'required|min:3|max:255',
            'zip_code' => 'numeric|digits:6',
        ];
    }

    public function messages(){
        return[
            'first_name.required' => 'The first name field is required.',
            'first_name.min' => 'The first name must be at least 1 characters.',
            'first_name.max' => 'The first name may not be greater than 100 characters.',
            'last_name.required' => 'The last name field is required.',
            'last_name.min' => 'The last name must be at least 1 characters.',
            'last_name.max' => 'The last name may not be greater than 100 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'phone.required' => 'The phone field is required.',
            'phone.numeric' => 'The phone must be a number.',
            'phone.min' => 'The phone must be at least 10 characters.',
            // 'phone.max' => 'The phone may not be greater than 12 characters.',
            'street.required' => 'The street field is required.',
            'street.min' => 'The street must be at least 3 characters.',
            'street.max' => 'The street may not be greater than 255 characters.',
            'ward.required' => 'The ward field is required.',
            'ward.min' => 'The ward must be at least 3 characters.',
            'ward.max' => 'The ward may not be greater than 255 characters.',
            'district.required' => 'The district field is required.',
            'district.min' => 'The district must be at least 3 characters.',
            'district.max' => 'The district may not be greater than 255 characters.',
            'city.required' => 'The city field is required.',
            'city.min' => 'The city must be at least 3 characters.',
            'city.max' => 'The city may not be greater than 255 characters.',
            'zip_code.numeric' => 'The zip code must be a number.',
            'zip_code.digits' => 'The zip code must have 6 digits.',
        ];
    }
}
