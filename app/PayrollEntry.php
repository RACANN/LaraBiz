<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayrollEntry extends Model
{

    public function payroll()
    {
        return $this->belongsTo(Payroll::class);
    }
    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }
}
