<?php

namespace App\Http\Controllers;

use App\Category;
use App\Employee;
use App\Order;
use App\OrderDetail;
use App\Product;
use App\Shift;
use Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function salesProfits()
    {
        $profit = 0;
        $orders = Order::all();
        foreach ($orders as $order)
        {
            foreach ($order->orderDetails as $od)
            {
                $profit += $od->product()->profit();
            }
        }
        return $profit;
    }
    public function totalLaborCost()
    {
        $cost = 0;
        $shifts = Shift::all();

        foreach ($shifts as $shift)
        {
            $cost += $shift->cost();
        }
        return $cost;
    }
    public function getTotalLaborCost()
    {
        $cost = $this->totalLaborCost();
        return response()->json(["cost" => $cost]);
    }
    public function totalLaborHours()
    {
        $hours = 0;

        $shifts = Shift::all();

        foreach ($shifts as $shift)
        {
            $hours += $shift->getShiftLength();
        }
        return response()->json(["hours" => $hours]);
    }
    public function totalSales()
    {
        $sales = 0;
        $orders = Order::all();
        foreach ($orders as $order)
        {
            $sales += $order->total;
        }
        return response()->json(["sales" => $sales]);
    }
    public function getSalesProfits()
    {
        $profit = $this->salesProfits();

        return response()->json(["sale_profits" => $profit]);
    }
    public function totalProfits()
    {
        return response()->json(["total_profits" => $this->salesProfits() - $this->totalLaborCost()]);
    }
    public function laborByEmployee()
    {
        $employees = Employee::all();
        $shifts = Shift::all();
        $data = [];

        foreach ($employees as $employee)
        {
            $employee_total_hours = 0;
            $employee_total_pay = 0;

            $shifts = $shifts->where('employee_id', '=', $employee->id)->where('open', '=', false);

            foreach ($shifts as $shift)
            {
                $employee_total_hours += $shift->getShiftLength();
                $employee_total_pay += $shift->cost();
            }
            $employee = ['id' => $employee->id, "first_name" => $employee->first_name, "last_name" => $employee->last_name];
            $employee_data = ["employee" => $employee, "total_hours" => $employee_total_hours, "total_pay" => $employee_total_pay];
            array_push($data, ["employee_data"=> $employee_data]);
        }

        return view('reports._partials.labor_by_employee_table', compact('data'));
    }
    public function totalSalesByCategory()
    {
        $order_deatils = OrderDetail::all();
        $categories = Category::all();
        $sold_products = collect(new Product);
        $data = [];
        foreach ($order_deatils as $od)
        {
            $sold_products->push($od->product());
        }
        foreach ($categories as $category)
        {
            $sp = $sold_products->where('category_id', '=', $category->id);
            $totalSales = 0;
            foreach($sp as $sold_product)
            {
                $totalSales += $sold_product->price;
            }
            array_push($data, ["category" => $category->name, "total_sales" => $totalSales]);
        }
        return view('reports._partials/total_sales_by_category_table', compact('data'));
    }
}
