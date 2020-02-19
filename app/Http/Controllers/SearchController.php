<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function getEmployeeList()
    {
        return response()->json(DB::table('employees')->select('first_name', 'last_name', 'id'));
    }

    public function getEmployeeByEmployeeNumber($employee_number)
    {
        return response()->json(DB::table('employees')->select( 'id', 'first_name', 'last_name', 'employee_number')->where('employee_number', '=', $employee_number)->first());
    }

    public function getProductByUpc(Request $request)
    {
        return response()->json(DB::table('products')->where('upc', request('upc'))->first());
    }
}
