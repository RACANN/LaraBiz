<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Shift;


class TimeClockController extends Controller
{
    public function ClockIn($employee_number)
    {

    }
    public function ClockOut($employee_number)
    {

    }
    public function Check($employee_number){
        $response = ['status' => [
            'code' => 0,
            'description' => 'No Status'
        ]];

        //First check if the employee exists
         if (Employee::all()->where("employee_number", "=", $employee_number)->count() < 1){
             $response['status']['code']=1;
             $response['status']['description'] = "Employee does not exists";
             return response()->json($response);
         }

         //If the employee has no open shits then they are ready to be clocked in
        $employee = Employee::where('employee_number', '=', $employee_number)->first();
        if(Shift::checkForOpenShifts($employee->id)==false){
            $response['status']['code']=2;
            $response['status']['description'] = "Employee ready to clock in";
             return response()->json($response);
        }

        //If the employee has open shifts then check if they need to go on break, come back from break, or clock out.
        if(Shift::checkForOpenShifts($employee->id)==true){
            $shift = Shift::where('employee_id', '=', $employee->id)->first();
            if(empty($shift->break_start)){
                $response['status']['code']=3;
                $response['status']['description'] = 'Employee clocked in with no break';
                return response()->json($response);
            }else{
                if(empty($shift->break_end)){
                    $response['status']['description'] = 'Still on break';
                    $response['status']['code'] = 4;
                }else{
                    $response['status']['description'] = 'Employee back from break';
                    $response['status']['code'] = 5;
                }
                return response()->json($response);
            }
        }
    }

}
