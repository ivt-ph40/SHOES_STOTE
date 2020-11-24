<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'category_id', 'brand_name',
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
