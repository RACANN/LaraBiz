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
        $employee = DB::table('employees')->select( 'id', 'first_name', 'last_name', 'employee_number')->where('employee_number', '=', $employee_number)->first();
        return empty($employee) ?  response()->json(['employee_found' => false]) :  response()->json($employee);
    }

    public function getProductByUpc(Request $request)
    {
        $product = DB::table('products')->where('upc', request('upc'))->first();
        return empty($product) ? response()->json(['product_found' => false]) :  response()->json($product);
    }
}
