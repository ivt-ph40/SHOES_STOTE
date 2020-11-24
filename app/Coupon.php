<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'discount_percent', 'start_date', 'end_date',
    ];

    public function products(){
        return $this->hasMany('App\Product');
    }
}
