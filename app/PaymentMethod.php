<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable = [
        'nane',
    ];

    public function orders(){
        return $this->hasMany('App\Order');
    }
}
