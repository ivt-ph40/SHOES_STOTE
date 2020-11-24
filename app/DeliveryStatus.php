<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryStatus extends Model
{
    protected $fillable = [
        'status',
    ];

    public function orders(){
        return $this->hasMany('App\Order');
    }
}
