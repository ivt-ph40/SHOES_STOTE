<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'order_code', 'order_date', 'ship_amount', 'ship_address_id', 'payment_method_id', 'delivery_status_id',
    ];

    public function deliver_status(){
        return $this->belongsTo('App\DeliverySatus');
    }

    public function payment_method(){
        return $this->belongsTo('App\PaymentMethod');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function address(){
        return $this->belongsTo('App\Address');
    }

    public function order_details(){
        return $this->hasMany('App\OrderDetail');
    }
}
