<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $table = 'order_items';

    public function orders(){
        return $this->belongsTo('App\Models\Order');
    }
}
