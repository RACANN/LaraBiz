<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function customer()
    {
    	return $this->belongsTo(Customer::class);
    }
    public function employee()
    {
    	return $this->belongsTo(Employee::class);
    }

}
