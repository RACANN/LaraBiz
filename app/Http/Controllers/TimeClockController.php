<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Shift;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TimeClockController extends Controller
{
    //***********************************************//
    //ClockIn logic handled by ShiftController@store//
    //**********************************************//

    public function StartBreak()
    {
        $employee_number = $_POST['employee_number'];
        $employee = Employee::where('employee_number', '=', $employee_number)->first();

        $this->checkEmployeeNumber($employee_number);

        $shift = Shift::where('employee_id', '=', $employee->id)->where('open', '=', true)->first();
        $shift->break_start = $shift->convertToLaravelTimeStamp(Carbon::now());
        $shift->save();

        return redirect('/timeclock')->with('status', 'Break started for '.$shift->employee->first_name.' '.$shift->employee->last_name.'.');
    }

    public function EndBreak()
    {
        $employee_number = $_POST['employee_number'];
        $employee = Employee::where('employee_number', '=', $employee_number)->first();

        $this->checkEmployeeNumber($employee_number);

        $shift = Shift::where('employee_id', '=', $employee->id)->where('open', '=', true)->first();
        $shift->break_end = $shift->convertToLaravelTimeStamp(Carbon::now());
        $shift->save();

        return redirect('/timeclock')->with('status', 'Break ended for '.$shift->employee->first_name.' '.$shift->employee->last_name.'.');
    }

    public function ClockOut()
    {
        $employee_number = $_POST['employee_number'];
        $employee = Employee::where('employee_number', '=', $employee_number)->first();

        $this->checkEmployeeNumber($employee_number);

        $shift = Shift::where('employee_id', '=', $employee->id)->where('open', '=', true)->first();
        $shift->shift_end = $shift->convertToLaravelTimeStamp(Carbon::now());
        $shift->open = false;
        $shift->save();

        return redirect('/timeclock')->with('status', 'Shift ended for '.$shift->employee->first_name.' '.$shift->employee->last_name.'.');
    }

    public function CheckStatus($employee_number)
    {
        $response = ['status' => [
            'code' => 0,
            'description' => 'No Status',
        ]];

        //First check if the employee exists
        if (Employee::all()->where('employee_number', '=', $employee_number)->count() < 1) {
            $response['status']['code'] = 1;
            $response['status']['description'] = 'Employee does not exists';

            return response()->json($response);
        }

        //If the employee has no open shits then they are ready to be clocked in
        $employee = Employee::where('employee_number', '=', $employee_number)->first();
        if (Shift::checkForOpenShifts($employee->id) == false) {
            $response['status']['code'] = 2;
            $response['status']['description'] = $employee->first_name.' '.$employee->last_name.' ready to clock in';

            return response()->json($response);
        }

        //If the employee has open shifts then check if they need to go on break, come back from break, or clock out.
        if (Shift::checkForOpenShifts($employee->id) == true) {
            $shift = Shift::where('employee_id', '=', $employee->id)->where('open', '=', true)->first();
            if (empty($shift->break_start)) {
                $response['status']['code'] = 3;
                $response['status']['description'] = $employee->first_name.' '.$employee->last_name.' clocked in with no break';

                return response()->json($response);
            }
            if (! empty($shift->break_start) && empty($shift->break_end)) {
                $response['status']['description'] = $employee->first_name.' '.$employee->last_name.' Still on break';
                $response['status']['code'] = 4;
            } else {
                $response['status']['description'] = $employee->first_name.' '.$employee->last_name.' back from break';
                $response['status']['code'] = 5;
            }

            return response()->json($response);
        }
    }

    public function checkEmployeeNumber($employee_number)
    {
        if (Employee::all()->where('employee_number', '=', $employee_number)->count() < 1) {
            return redirect('/timeclock')->with('status', 'Employee Not Found');
        }

        $employee = Employee::where('employee_number', '=', $employee_number)->first();

        if (Shift::where('employee_id', '=', $employee->id)->where('open', '=', true)->count() > 1) {
            return redirect('/timeclock')->with('status', 'Employee has multiple shifts open. Please contact manager or admin');
        }
    }
}
