<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkSchedule extends Model
{
    public function assingments()
    {
        return $this->hasMany(Assignment::class);
    }
    public function schedule_setting()
    {
        return $this->belongsTo(ScheduleSetting::class);
    }

    public function addAssignment($employeeId, $details, $start, $end)
    {
        $assignment = Assignment::create([
            'employee_id' => $employeeId,
            'details' => $details,
            'start' => $start,
            'end' => $end
        ]);

        $this->assingments()->save($assignment);
    }
    public function removeAssignment(Assignment $assignment)
    {
        $this->assingments()->delete($assignment);
    }

}
