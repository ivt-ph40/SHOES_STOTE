<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes; 
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use Notifiable,
        SoftDeletes;

    protected $fillable = [
        'brand_name',
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }

}
