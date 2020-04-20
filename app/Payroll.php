<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Payroll extends Model
{
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function payrollEntries()
    {
        return $this->hasMany(PayrollEntry::class);
    }
    public static function runPayroll($start_date, $interval)
    {
        $openShifts = Shift::anyOpenShifts();

        if($openShifts > 0){
            return redirect('/shifts');
        }else{
            $employees = Employee::all();
            foreach ($employees as $employee){
                $payroll = new Payroll();
                $payroll->has_overtime = false;
                $payroll->employee_id = $employee->id;
                $payroll->ot_hours = 0;
                $payroll->total_hours = 0;
                $payroll->ot_paid = 0;
                $payroll->total_paid = 0;
                $payroll->save();
                if($interval==1){
                    $weeks = [];
                    array_push($weeks,$payroll->runWeek($start_date,Carbon::parse($start_date)->addWeek(), $employee));
                    $data = [
                        "hours" => $weeks[0]['hours'],
                        "ot_hours" => $weeks[0]['ot_hours'],
                        "base_pay" => $weeks[0]['base_pay'],
                        "ot_pay" => $weeks[0]['ot_pay'],
                        "total_pay" => $weeks[0]['total_pay'],
                    ];
                }else {
                    $weeks = [];
                    array_push($weeks,$payroll->runWeek($start_date,Carbon::parse($start_date)->addWeek(), $employee));
                    array_push($weeks,$payroll->runWeek(Carbon::parse($start_date)->addWeek(),Carbon::parse($start_date)->addWeeks(2), $employee));
                    $data = [
                        "hours" => $weeks[0]['hours'] + $weeks[1]['hours'],
                        "ot_hours" => $weeks[0]['ot_hours'] + $weeks[1]['ot_hours'],
                        "base_pay" => $weeks[0]['base_pay'] + $weeks[1]['base_pay'],
                        "ot_pay" => $weeks[0]['ot_pay'] + $weeks[1]['ot_pay'],
                        "total_pay" => $weeks[0]['total_pay'] + $weeks[1]['total_pay'],
                    ];
                }
            }
            $payroll->total_hours = $data['hours'];
            $payroll->ot_hours = $data['ot_hours'];
            $payroll->ot_paid = $data['ot_pay'];
            $payroll->total_paid = $data['total_pay'];
            $payroll->save();
            return redirect('/payrolls');
        }
    }

    public function runWeek($start_date, $stop_date, $employee)
    {
        $hours = 0;
        $ot_hours = 0;
        $base_pay = 0;
        $ot_pay = 0;

        $shifts = Shift::all()->where("employee_id", "=", $employee->id)
            ->where("shift_start", ">=",  $start_date)
            ->where("shift_start", "<=", $stop_date);
        if($shifts->count() > 0){
            foreach ($shifts as $shift){
                $hours += $shift->getShiftLength();
                $payrollEntry = new PayrollEntry();
                $payrollEntry->shift_id = $shift->id;
                $payrollEntry->payroll_id = $this->id;
                $payrollEntry->save();
            }
            if($hours > 40)
            {
                $this->hasOverTime = true;
                $total_hours = $hours;
                $ot_hours = $hours-40;
                $hours = $hours - $ot_hours;
                $base_pay = $hours * $employee->pay;
                $ot_pay = ($employee->pay * 1.5) * $ot_hours;
                $total_pay = $base_pay + $ot_pay;
            }else{
                $total_hours = $hours;
                $total_pay = $total_hours * $employee->pay;
            }

            $data = ["hours" => $total_hours, "ot_hours" => $ot_hours, "base_pay" => $base_pay, "ot_pay" => $ot_pay, "total_pay" => $total_pay];

            return $data;
        }

    }
}
