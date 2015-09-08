<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function role_module(){
        return $this->belongsTo('App\Models\Role_Module');
    }
    public function products(){
        return $this->hasMany('App\Models\Product','category_id');
    }
}
