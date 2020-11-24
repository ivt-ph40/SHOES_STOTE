<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'product_id', 'rating',
    ];

    public function product(){
        return $this->belongsTo('App\Product');
    }
}
