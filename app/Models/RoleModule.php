<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleModule extends Model
{
    protected $table = 'role_module';

    public function roles(){
        $this->belongsTo('App\Models\Role');
    }
    public function categories(){
        $this->hasMany('App\Models\Category','module_id');
    }
}
