<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttCategory extends Model
{
    protected $table = 'att_categories';

    public function attributes(){
        return $this->hasMany('App\Models\Attribute','att_category_id');
    }
}
