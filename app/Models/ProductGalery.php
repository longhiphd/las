<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductGalery extends Model
{
    protected $table = 'product_galeries';

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
