<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function products()
    {
         return Product::all()->where("id", "=", $this->product_id);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
