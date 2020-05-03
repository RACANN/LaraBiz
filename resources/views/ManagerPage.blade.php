@extends('layouts.master')
@section('custom-css')
    <style>
        a:link {
            text-decoration: none !important;
        }
    </style>
@endsection
@section('content')
    <br />
    <div class="tile is-ancestor">
        <div class="tile is-vertical is-8">
            <div class="tile">
                <div class="tile is-parent is-vertical">
                    <article class="tile is-child notification is-info">
                        <a href="/employees"><h1 class="title">Employees</h1></a>
                    </article>

                </div>
                <div class="tile is-parent">
                    <article class="tile is-child notification is-info">
                        <a href="/products"><h1 class="title">Inventory</h1></a>

                    </article>
                </div>
            </div>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child notification is-info">
                <a href="/orders"><h1 class="title">Sales</h1></a>
            </article>
        </div>
    </div>
    <div class="tile is-ancestor">
        <div class="tile is-vertical is-8">
            <div class="tile">
                <div class="tile is-parent is-vertical">
                    <article class="tile is-child notification is-info">
                        <a href="/shifts"><h1 class="title">Labor</h1></a>
                    </article>

                </div>
                <div class="tile is-parent">
                    <article class="tile is-child notification is-info">
                        <a href="/payrolls"><h1 class="title">Payroll</h1></a>

                    </article>
                </div>
            </div>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child notification is-info">
                <a href="/reports"><h1 class="title">Reports</h1></a>

            </article>
        </div>
    </div>
    <br/>

@endsection
@section('footer')
@endsection