@extends('layouts.minimal')
@section('content')
    <br />

    <div class="tile is-ancestor">
        <div class="tile is-vertical is-8">
            <div class="tile">
                <div class="tile is-parent is-vertical">
                    <article class="tile is-child notification is-primary">
                        <h1 class="title">Store</h1>
                        <ul class="menu-list m-1">
                            <br />
                            <li><a href="/order/new" class="button">Place An Order</a></li>
                            <li><a href="/orders" class="button">View Orders</a></li>
                            <li><a href="/products" class="button">Check In Item(s)</a></li>
                            <li><a href="#" class="button">Sales, Deals, Info</a></li>
                            <br />
                        </ul>
                    </article>
                    {{--<article class="tile is-child notification is-warning">--}}
                        {{--<p class="title">...tiles</p>--}}
                        {{--<p class="subtitle">Bottom tile</p>--}}
                    {{--</article>--}}
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child notification is-info">
                        <h1 class="title">System</h1>
                        <ul class="menu-list m-1">
                            <br />
                            <li><a href="/shift/new" class="button">Clock In/Out</a></li>
                            <li><a href="/shifts" class="button">Active Employees</a></li>
                            <li><a href="#" class="button">View Schedule</a></li>
                            <li><a href="/orders" class="button">Other</a></li>
                            <br />
                        </ul>
                    </article>
                </div>
            </div>
            {{--<div class="tile is-parent">--}}
                {{--<article class="tile is-child notification is-danger">--}}
                    {{--<p class="title">Wide tile</p>--}}
                    {{--<p class="subtitle">Aligned with the right tile</p>--}}
                    {{--<div class="content">--}}
                        {{--<!-- Content -->--}}
                    {{--</div>--}}
                {{--</article>--}}
            {{--</div>--}}
        </div>
        <div class="tile is-parent">
            <article class="tile is-child notification is-success">
                <h1 class="title">Manager</h1>
                <ul class="menu-list m-1">
                    <br />
                    <li><a href="/employees" class="button">Manage Employees</a></li>
                    <li><a href="/shifts" class="button">Manage Shifts</a></li>
                    <li><a href="#" class="button">Manage Schedule</a></li>
                    <li><a href="/manager" class="button">Manager Dashboard</a></li>
                    <br />
                </ul>
            </article>
        </div>
    </div>
    <br/>

@endsection
@section('footer')
@endsection