<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function attributes(){
        return $this->belongsToMany('App\Models\Attribute','product_att','product_id','att_id');
    }
    public function groups(){
        return $this->belongsToMany('App\Models\Group','group_product','product_id','group_id');
    }
    public function galeries(){
        return $this->hasMany('App\Models\ProductGalery','product_id');
    }
    public function rates(){
        return $this->hasMany('App\Models\ProductRate','product_id');
    }
}
