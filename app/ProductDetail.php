<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
use Illuminate\Notifications\Notifiable;
class ProductDetail extends Model
{
    use Notifiable,
        SoftDeletes;
        
    protected $fillable = [
        'product_id',
        'size',
        'color',
        'quantity',
        'material',
        'product_status',
        'specifications',
    ];

    public function product(){
        return $this->belongsTo('App\Product');
    }
}
