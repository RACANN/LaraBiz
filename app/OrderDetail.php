<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function product()
    {
         return Product::find($this->product_id)->first();
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
