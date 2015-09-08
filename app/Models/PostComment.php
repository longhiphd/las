<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    protected $table = 'post_comments';
    public function post(){
        return $this->belongsTo('App\Models\Post');
    }
}
