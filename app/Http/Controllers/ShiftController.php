<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Shift;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shifts = Shift::all();

        return view('shifts.index', compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shifts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = Employee::where('employee_number', '=', request('employee_number'))->first();
        $origin = $_POST['origin'];
        if($origin == "manager"){
            if(Shift::checkForOpenShifts($employee->id)==false){
                $shift = new Shift;
                $shift->employee_id = $employee->id;
                $shift->shift_start = Carbon::now();
                $shift->open = true;
                $shift->save();
                return redirect('/shifts')->with('shift_added', "Shift added for ".$employee->first_name." ".$employee->last_name.'.');
            }else{
                return redirect('/shifts')->with('employee_exists', $employee->first_name." ".$employee->last_name.' already has open shifts');
            }
        }elseif ($origin=="timeclock"){
            if(Shift::checkForOpenShifts($employee->id)==false){
                $shift = new Shift;
                $shift->employee_id = $employee->id;
                $shift->shift_start = Carbon::now();
                $shift->open = true;
                $shift->save();
                return redirect('/timeclock')->with('shift_added', "Shift added for ".$employee->first_name." ".$employee->last_name.'.');
            }else{
                return redirect('/timeclock')->with('employee_exists', $employee->first_name." ".$employee->last_name.' already has open shifts');
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function show(Shift $shift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function edit(Shift $shift)
    {
        return view ('shifts.edit', compact('shift'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shift $shift)
    {
        $shift->shift_start = $shift->convertToLaravelTimeStamp(request('shift_start'));
        $shift->break_start = $shift->convertToLaravelTimeStamp(request('break_start'));
        $shift->break_end = $shift->convertToLaravelTimeStamp(request('break_end'));
        $shift->shift_end = $shift->convertToLaravelTimeStamp(request('shift_end'));
        $shift->open = request('open');
        $shift->save();
        return redirect('/shifts')->with('shift_edited', "Shift edited for ".$shift->employee->first_name." ".$shift->employee->last_name.'.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shift $shift)
    {
        $shift->delete();
    }
}
