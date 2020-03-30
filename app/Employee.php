<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['ssn', 'employee_number', 'first_name', 'last_name', 'birth_date', 'phone', 'email',
        'hire_date', 'pay', ];

    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }
    public function payrolls()
    {
        return $this->hasMany(Payroll::class);
    }
    public  function getFullName()
    {
        return $this->first_name." ".$this->last_name;
    }

    public function calcPay($time)
    {
        return $time * $this->pay;
    }

}
