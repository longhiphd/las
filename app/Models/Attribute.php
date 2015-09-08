<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table = 'atts';

    public function products(){
        return $this->belongsToMany('App\Models\Product','product_att','att_id','product_id');
    }
    public function att_category(){
        return $this->belongsTo('App\Models\AttCategory');
    }
}
