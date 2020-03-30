<?php

namespace App\Http\Controllers;

use App\Payroll;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $payrolls = Payroll::all();
//        $employee_ids = $payrolls->groupBy('employee_id')->pluck('employee_id');
//        foreach($employee_ids as $employee_id){
//            $current_set = $payrolls->where('employee_id', "=", $employee_id);
//            foreach ($current_set as $payroll){
//                $summary = [
//                    'time' => $payroll->created_at,
//                    'total_paid' => $payroll->total_paid,
//                    'total_hours' => $payroll->total_hours,
//                    'ot_hours' => $payroll->ot_hours,
//                    'ot_paid' => $payroll->ot_paid
//                ];
//                array_push($data, [
//                    "employee" => $payroll->employee,
//                    "sumarry" => $summary,
//                    "entries" => $payroll->payrollEntries()
//                    ]);
//
//            }
//        }
        return view('payroll.index', compact('payrolls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $start_date = $request['start_date'];
        $interval = $request['interval'];

        Payroll::runPayroll($start_date, $interval);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function show(Payroll $payroll)
    {
        return view('payroll.payroll', compact('payroll'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function edit(Payroll $payroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payroll $payroll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payroll $payroll)
    {
        //
    }
}
