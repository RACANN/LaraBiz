<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate(request(), [
            'ssn' => 'required',
            'employee_number' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'birth_date' => 'required', 
            'hire_date' => 'required',
            'pay' => 'required'
            ]);

        $employee = new Employee;

        $employee->ssn = request('ssn');
        $employee->employee_number = request('employee_number');
        $employee->first_name = request('first_name');
        $employee->last_name = request('last_name');
        $employee->email = request('email');
        $employee->phone = request('phone');
        $employee->birth_date = request('birth_date');
        $employee->hire_date = request('hire_date');
        $employee->pay = request('pay');

        $employee->save();

         return redirect('/employees');




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employees.show', compact($employee));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $this->validate(request(), [
            'ssn' => 'required',
            'employee_number' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'birth_date' => 'required', 
            'hire_date' => 'required',
            'pay' => 'required'
            ]);

        $employee->ssn = request('ssn');
        $employee->employee_number = request('employee_number');
        $employee->first_name = request('first_name');
        $employee->last_name = request('last_name');
        $employee->email = request('email');
        $employee->phone = request('phone');
        $employee->birth_date = request('birth_date');
        $employee->hire_date = request('hire_date');
        $employee->pay = request('pay');

        $employee->save();

        return redirect('/employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect('/employees');
    }
}
