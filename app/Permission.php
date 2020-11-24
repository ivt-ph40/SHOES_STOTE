<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'permisson_name',
    ];

    public function roles(){
        return $this->belongsToMany('App\Role');
    }
}
