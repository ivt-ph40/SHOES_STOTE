<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'brand_id',
        'product_code',
        'product_name',
        'price',
        'description',
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function brand(){
        return $this->belongsTo('App\Brand');
    }

    public function images(){
        return $this->hasMany('App\Image');
    }

    public function reviews(){
        return $this->hasMany('App\Review');
    }

    public function ratings(){
        return $this->hasMany('App\Rating');
    }

    public function product_details(){
        return $this->hasMany('App\ProductDetail');
    }

}
