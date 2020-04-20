<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function pos()
    {
        $user_id = Auth::user()->id;
        $employee = Employee::where('user_id', '=', $user_id)->first();
        $employee_number = $employee->employee_number;
        return view('pos', compact('employee_number'));
    }
}
