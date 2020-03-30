<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Product;
use App\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ExportController extends Controller
{
    public function exportEmployees()
    {
        $data = [];
        array_push($data, ["First Name", "Last Name", "Start Date", "Pay", "Position"]);
        $employees = Employee::all();
        foreach ($employees as $employee)
        {
            array_push($data, [$employee->first_name, $employee->last_name, $employee->hire_date, $employee->pay, $employee->position]);
        }
        $this->exportToCsv("employees", $data);
        $file = '../storage/app/exports/employees.csv';
        $name = basename($file);
        return response()->download($file, $name)->deleteFileAfterSend(true);
    }
    public function exportProducts()
    {
        $data = [];
        array_push($data, ["UPC", "Name", "Description", "Cost", "Price", "Profit"]);
        $products = Product::all();
        foreach ($products as $product) {
            array_push($data, [
                $product->upc,
                $product->name,
                $product->description,
                $product->cost,
                $product->price,
                $product->profit()
            ]);
        }
        $this->exportToCsv("products", $data);
        $file = '../storage/app/exports/products.csv';
        $name = basename($file);
        return response()->download($file, $name)->deleteFileAfterSend(true);
    }
    public function exportShifts()
    {
        $data = [];
        array_push($data, [
            "Employee",
            "Shift Start",
            "Break Start",
            "Break End",
            "Shift End",
            "Cost",
            "Open"
            ]);
        $shifts = Shift::all();
        foreach ($shifts as $shift){
            array_push($data, [
                $shift->employee->getFullName(),
                $shift->showTime('shift_start'),
                empty($shift->break_start) ? "No Break Start" : $shift->showTime('break_start'),
                empty($shift->break_end) ? "No Break End" : $shift->showTime('break_end'),
                empty($shift->shift_end) ? "No Shift End" : $shift->showTime('shift_end'),
                $shift->open==true ? "Shift Still Open" : $shift->getShiftLength(),
                $shift->open==true ? "Yes" : "No"
            ]);
        }
        $this->exportToCsv("shifts", $data);
        $file = '../storage/app/exports/shifts.csv';
        $name = basename($file);
        return response()->download($file, $name)->deleteFileAfterSend(true);
    }
    public function exportToCsv($type, $data)
    {
        $fp = fopen('../storage/app/exports/'.$type.'.csv', 'w') or die('Can\'t create file');
        foreach ($data as $d){
            fputcsv($fp, $d);
        }
        fclose($fp);
    }
}
