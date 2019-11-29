<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

        return Carbon::parse($grossShiftTime - $totalBreaks)->toTimeString();

    }

    public static function checkForOpenShifts($id)
    {
        //return Shift::all()->where('open', '=', 'true')->count() == 0 ? false : true;
        $count =  Shift::all()->where("employee_id", "=", $id)->where('open', '=', '1')->count();

        return ($count != 0) ?  true : false;
    }

    public function convertToHtmlDateTime($value)
    {
        return (!empty($value)) ? Carbon::parse($value)->format('Y-m-d\TH:i') : $value;
    }
    public function convertToLaravelTimeStamp($value)
    {
        return Carbon::parse($value)->toDateTimeString();
    }
    public function showTime($option)
    {
        switch ($option)
        {
            case "shift_start":
                return Carbon::parse($this->break_start)->toDayDateTimeString();
            case "break_start":
                return Carbon::parse($this->break_start)->toDayDateTimeString();
            case "break_end":
                return Carbon::parse($this->break_end)->toDayDateTimeString();
            case "shift_end":
                return Carbon::parse($this->shift_end)->toDayDateTimeString();
            default:
                return "";

        }
    }
}
