<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    public function employee()
    {
    	return $this->belongsTo(Employee::class);
    }
    public function getShiftLength()
    {
        $grossShiftTime = ($this->shift_end - $this->shift_start);
        $totalBreaks = 0;
        if($this->break_start != null){
            $totalBreaks = ($this->break_end - $this->break_start);
        }

        return $grossShiftTime - $totalBreaks;

    }
}
