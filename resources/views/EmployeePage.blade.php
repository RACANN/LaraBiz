@extends('layouts.minimal')
@section('custom-css')
    <style>
        a:link {
            text-decoration: none !important;
        }
    </style>
@endsection
@section('content')
    <br />



    <div class="columns">
        <div class="column">
            <article class="notification is-info">
                <h1 class="title">Store</h1>
                <ul class="menu-list m-1">
                    <br />
                    <li><a href="/pos" class="button">Place An Order</a></li>
                    <li><a href="#" class="button">View Your Sales</a></li>
                    <li><a href="#" class="button">Check In Item(s)</a></li>
                    <br />
                </ul>
            </article>
        </div>
        <div class="column">
            <article class="notification is-info">
                <h1 class="title">System</h1>
                <ul class="menu-list m-1">
                    <br />
                    <li><a href="/timeclock" class="button">Clock In/Out</a></li>
                    <li><a href="#" class="button">View Your Shifts</a></li>
                    <li><a href="#" class="button">View Schedule</a></li>
                    <br />
                </ul>
            </article>
        </div>
    </div>

    <br/>

@endsection
@section('footer')
@endsection