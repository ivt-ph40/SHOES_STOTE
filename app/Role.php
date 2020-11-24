<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'role_name',
    ];

    public function permissions(){
        return $this->hasMany('App\Permisson');
    }

    public function users(){
        return $this->hasMany('App\User');
    }
}
