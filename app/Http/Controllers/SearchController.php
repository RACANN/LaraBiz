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

    public function getProductByUpc(Request $request)
    {
        return response()->json(DB::table('products')->where('upc', request('upc'))->first());
    }
}
