<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function addQty($amount)
    {
        $this->quantity = $this->quantity + $amount;

        $this->save();
    }

    public function profit()
    {
        return $this->price - $this->cost;
    }

    public function subtractQty($amount)
    {
        $this->quantity = $this->quantity - $amount;

        $this->save();
    }
}
