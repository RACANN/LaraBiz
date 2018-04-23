<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function work_schedule()
    {
        return $this->belongsTo(WorkSchedule::class);
    }

}
