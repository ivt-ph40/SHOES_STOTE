<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $fillable = [
        'product_id', 'size', 'color', 'quantity', 'material', 'product_status', 'specifications',
    ];

    public function product(){
        return $this->belongsTo('App\Product');
    }
}
