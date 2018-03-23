<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['ssn', 'employee_number', 'first_name', 'last_name', 'birth_date', 'phone', 'email',  'hire_date', 'pay'];

    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }

    public function calcPay($time)
    {
        return ($time * $this->pay);
    }

    public function calcPayRoll($startPayDate, $endPayDate)
    {
        $shiftsInRange = $this->shifts()->whereBetween('shift_start', [$startPayDate, $endPayDate])->get();

        $pay = 0;

        foreach ($shiftsInRange as $shift)
        {
            $time = $shift->getShiftLength();
            $pay += $this->calcPay($time);

        }
        return $pay;
    }

}
