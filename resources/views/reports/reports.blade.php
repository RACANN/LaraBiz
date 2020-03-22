@extends('layouts.master')
@section('content')
    <div id="reports">
        <div class="container">
            <nav class="panel is-full">
                <p class="panel-heading">
                    Point Of Sale
                </p>
                <p class="panel-tabs">
                    <a id="laborReportsTab" class="is-active" @click="laborReports">Labor</a>
                    <a id="salesReportsTab" @click="salesReports">Sales</a>
                    <a id="profitReportsTab" @click="profitReports">Profit</a>
                </p>
                <div id="laborReports" style="width:100%">
                    <div class="panel-block">
                        <h1 class="headline is-size-4">Labor Reports</h1>
                    </div>
                    <div class="panel-block">
                        <p>Total Labor Costs : $@{{ total_labor_cost }}</p>
                    </div>
                    <div class="panel-block">
                        <p>Total Labor Hours : @{{ total_labor_hours }}</p>
                    </div>
                    <hr>
                    <h1>Labor By Employee</h1>
                    <hr class="headline is-size-4">
                    <table id="labor_by_employee_report" style="width:100%">

                    </table>

                </div>

                <div id="salesReports">
                    <div class="panel-block">
                        <h1 class="headline is-size-4">Sales Reports</h1>
                    </div>
                    <div class="panel-block">
                        <p>Total Sales:  $@{{ total_sales }}</p>
                    </div>
                    <hr>
                    <h1>Sales By Category</h1>
                    <hr class="headline is-size-4">
                    <table id="sales_by_category" style="width:100%">

                    </table>
                </div>
                <div id="profitReports">
                    <div class="panel-block">
                        <h1 class="headline is-size-4">Profit Reports</h1>
                    </div>
                    <div class="panel-block">
                        <p>Sales Profits : $@{{ total_sales_profits }}</p>
                    </div>
                    <div class="panel-block">
                        <p>Total Profits : @{{ total_profits }}</p>
                    </div>
                    <div class="panel-block">
                    </div>
                </div>

            </nav>
        </div>
    </div>
@endsection
@section('custom-js')
    <script src={{ asset('js/reports.js') }}></script>
@endsection