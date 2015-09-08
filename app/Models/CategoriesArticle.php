<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriesArticle extends Model
{
    protected $table = 'categories_article';

    public function posts(){
        return $this->hasMany('App\Models\Post','category_id');
    }
}
