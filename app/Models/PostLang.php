<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostLang extends Model
{
    protected $table = 'post_langs';
    public function posts(){
        return $this->hasMany('App\Models\Post','lang_id');
    }
    public function tags(){
        return $this->hasMany('App\Models\Tags','lang_id');
    }
}
