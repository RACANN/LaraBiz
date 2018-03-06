<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function addQty($amount)
    {
        $this->quantity = $this->quantity + $amount;

        $this->save();

    }

    public function subtractQty($amount)
    {
        $this->quantity = $this->quantity - $amount;

        $this->save();
    }

}
