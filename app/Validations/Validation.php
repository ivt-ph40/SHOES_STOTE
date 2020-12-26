<?php

namespace App\Validations;
use Illuminate\Validation\Rule;

class Validation
{
    public static function validateBrandRequest($request)
    {
        return $request->validate([
            'brand_name' => 'bail|required|string|min:3|max:10|unique:brands',
        ]);
    }

    public static function validateCategorydRequest($request)
    {
        // dd($this->request->get('category_name'));
        return $request->validate([
            'category_name' =>['bail','required','string','min:3','max:10',
            Rule::unique('categories')
            ->where('category_name',$request->category_name)
            ->where('parent_id',$request->parent_id)],
        ]);
    }

    public static function validateProductRequest($request)
    {
        return $request->validate([
            'product_code' => 'bail|required|string|min:3|max:10|unique:products',
            'product_name' => 'bail|required|string|min:3|max:200',
        ]);
    }
}