<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    public function tags(){
        return $this->belongsToMany('App\Models\Tags','post_tag','post_id','tag_id');
    }
    public function post_langs(){
        return $this->belongsTo('App\Models\PostLang');
    }
    public function users(){
        return $this->belongsTo('App\User');
    }
    public function categories_article(){
        return $this->belongsTo('App\Models\CategoriesArticle');
    }
    public function comments(){
        return $this->hasMany('App\Models\PostComment','post_id');
    }
}
