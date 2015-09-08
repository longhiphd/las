<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table = 'tags';
    public function posts(){
        return $this->belongsToMany('App\Models\Post','post_tag','tag_id','post_id');
    }
    public function post_langs(){
        return $this->belongsTo('App\Models\PostLang');
    }
}
