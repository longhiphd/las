<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductRate extends Model
{
    protected $table = 'product_rates';
    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
