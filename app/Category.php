<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'parent_id',
    ];

    public function brands(){
        return $this->hasMany('App\Brand');
    }

    public function products(){
        return $this->hasMany('App\Product');
    }
}
