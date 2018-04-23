<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaySchedule extends Model
{
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
    public function schedule_setting()
    {
        return $this->belongsTo(ScheduleSetting::class);
    }
    public function addEmployee($id)
    {
        if($this->employees()->find($id))
        {
            //Do nothing but alert user that employy already assigned to pay schedule

        }
        else
        {
            $employee = Employee::find($id);
            $this->employees()->save($employee);
            redirect('/schedules/work');
        }

    }

}
