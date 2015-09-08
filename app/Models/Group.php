<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    public function products(){
        return $this->belongsToMany('App\Models\Product','group_product','group_id','product_id');
    }
}
