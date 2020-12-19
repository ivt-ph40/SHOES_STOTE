<?php

namespace App\Validations;

class Validation
{
    public static function validateBrandRequest($request)
    {
        return $request->validate([
            'brand_name' => 'bail|required|string|min:3|max:10|unique:brands',
        ]);
    }
}