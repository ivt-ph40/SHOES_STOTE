<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
<<<<<<< HEAD
        'category_name', 'parent_id',
=======
        'name',
        'parent_id',
>>>>>>> 7460118e39d061dca36f8a2a9014ad76418aeaff
    ];

    public function products(){
        return $this->hasMany('App\Product');
    }
}
