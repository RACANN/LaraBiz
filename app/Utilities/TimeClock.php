<?php

use App\Shift;

class TimeClock
{
    public function checkForOpenShifts($id)
    {
         return Shift::all()->where('is_open', '=', 'true')->count() == 0 ? flase : true;
    }
}