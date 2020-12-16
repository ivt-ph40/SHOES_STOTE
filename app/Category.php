<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use Notifiable,
        SoftDeletes;
    
    protected $fillable = [
        'category_name',
        'parent_id',
    ];

    public function products(){
        return $this->hasMany('App\Product');
    }
}
