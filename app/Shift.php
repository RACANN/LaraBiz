<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function getShiftLength()
    {
        //$shiftLength = gmdate('H:i:s', Carbon::parse($this->shift_end)->diffInSeconds(Carbon::parse($this->shift_start)));

        $shiftLength =  Carbon::parse($this->shift_end)->floatDiffInRealHours(Carbon::parse($this->shift_start));

        return ! empty($this->getBreakLength()) ? $shiftLength -  $this->getBreakLength() : $shiftLength;
    }

    public function cost()
    {
        return $this->getShiftLength() * $this->employee->pay;
    }

    public function getBreakLength()
    {
        return ! empty($this->break_start) ?  Carbon::parse($this->break_end)->floatDiffInRealHours(Carbon::parse($this->break_start)) : '';
    }

    public static function anyOpenShifts()
    {
        //return Shift::all()->where('open', '=', 'true')->count() == 0 ? false : true;
        $count = self::all()->where('open', '=', '1')->count();

        return ($count != 0) ? true : false;
    }

    public static function checkForOpenShifts($id)
    {
        //return Shift::all()->where('open', '=', 'true')->count() == 0 ? false : true;
        $count = self::all()->where('employee_id', '=', $id)->where('open', '=', '1')->count();

        return ($count != 0) ? true : false;
    }

    public function convertToHtmlDateTime($value)
    {
        return (! empty($value)) ? Carbon::parse($value)->format('Y-m-d\TH:i') : $value;
    }

    public function convertToLaravelTimeStamp($value)
    {
        return (! empty($value)) ? Carbon::parse($value)->toDateTimeString() : $value;
    }

    public function showTime($option)
    {
        switch ($option) {
            case 'shift_start':
                return Carbon::parse($this->shift_start)->toDayDateTimeString();
            case 'break_start':
                return Carbon::parse($this->break_start)->toDayDateTimeString();
            case 'break_end':
                return Carbon::parse($this->break_end)->toDayDateTimeString();
            case 'shift_end':
                return Carbon::parse($this->shift_end)->toDayDateTimeString();
            case 'shift_length':
                return Carbon::parse($this->getShiftLength());
            default:
                return '';
        }
    }

    public function checkAndSave($employee_id)
    {
        if (self::checkForOpenShifts($employee_id) == false) {
            $shift = new self;
            $shift->employee_id = $employee_id;
            $shift->shift_start = Carbon::now();
            $shift->open = true;
            $shift->save();

            return redirect('/shifts')->with('shift_added', 'Shift added for '.$this->employee->first_name.' '.$this->employee->last_name.'.');
        } else {
            return redirect('/shifts')->with('employee_exists', $this->employee->first_name.' '.$this->last_name.' already has open shifts');
        }
    }
}
