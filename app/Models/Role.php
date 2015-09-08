<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table='roles';
    public function users(){
        return $this->belongsToMany('App\User','user_role','role_id','user_id');
    }
    public function role_module(){
        return $this->hasMany('App\Models\RoleModule','role_id');
    }
}
