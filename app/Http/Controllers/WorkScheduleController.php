<?php

namespace App\Http\Controllers;

use App\WorkSchedule;
use Illuminate\Http\Request;

class WorkScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $work_schedules = WorkSchedule::all();

        return view('workschedules.index', 'work_schedule');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('workschedules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request([
            'start' => 'required',
            'end' => 'required',
            'name' => 'required',

        ]));

        $work_schedule = New WorkSchedule;

        $work_schedule->start = request('start');
        $work_schedule->end = request('end');
        $work_schedule->name = request('name');

        $work_schedule->save();

        return redirect('/workschedules');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WorkSchedule  $workSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(WorkSchedule $workSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WorkSchedule  $workSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkSchedule $workSchedule)
    {
        return view ('/workschedules.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WorkSchedule  $workSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkSchedule $workSchedule)
    {
        $this->validate(request([
            'start' => 'required',
            'end' => 'required',
            'name' => 'required',

        ]));


        $workSchedule->start = request('start');
        $workSchedule->end = request('end');
        $workSchedule->name = request('name');

        $workSchedule->save();

        return redirect('/workschedules');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WorkSchedule  $workSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkSchedule $workSchedule)
    {
        $workSchedule->delete();

        return redirect('/workschedules');
    }
}
