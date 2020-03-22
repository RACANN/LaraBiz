<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function product()
    {
        return Product::where('id', '=', $this->product_id)->first();
    }
    public function category()
    {
        return Category::where('id', '=', $this->product()->category_id)->first();
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
