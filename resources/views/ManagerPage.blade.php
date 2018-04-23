@extends('layouts.master')
@section('content')
    <br />
    <div class="tile is-ancestor">
        <div class="tile is-vertical is-8">
            <div class="tile">
                <div class="tile is-parent is-vertical">
                    <article class="tile is-child notification is-primary">
                            <h1 class="title">Employees and Schedule</h1>
                            <div class="columns">
                                <div class="column is-half">
                                    <i class="fa fa-users fa-4x is-boxed"></i>
                                    <p>All Employees</p>
                                </div>
                                <div class="column is-half">
                                    <i class="fa fa-user-plus fa-4x is-boxed"></i>
                                    <p>Add Employee</p>
                                </div>

                            </div>
                        {{--<div class="columns">--}}
                            {{--<div class="column is-one-third">--}}
                                {{--<i class="fa fa-users fa-4x is-boxed"></i>--}}
                                {{--<p>All Employees</p>--}}
                            {{--</div>--}}
                            {{--<div class="column is-one-third">--}}
                                {{--<i class="fa fa-user-plus fa-4x is-boxed"></i>--}}
                                {{--<p>Add Employee</p>--}}
                            {{--</div>--}}
                            {{--<div class="column is-one-third">--}}
                                {{--<i class="fa fa-user-plus fa-4x is-boxed"></i>--}}
                                {{--<p>Add Employee</p>--}}
                            {{--</div>--}}

                        {{--</div>--}}


                    </article>
                    {{--<article class="tile is-child notification is-warning">--}}
                    {{--<p class="title">...tiles</p>--}}
                    {{--<p class="subtitle">Bottom tile</p>--}}
                    {{--</article>--}}
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child notification is-info">
                        <h1 class="title">Inventory</h1>
                        <div class="is-grouped">
                            <i class="fa fa-check-square-o fa-4x"></i>
                            <i class="fa fa-check-square-o fa-4x"></i>
                            <i class="fa fa-check-square-o fa-4x"></i>
                        </div>
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
                <h1 class="title">Sales and Payroll</h1>
                <i class="fa fa-usd fa-4x"></i>
            </article>
        </div>
    </div>
    <br/>

@endsection
@section('footer')
@endsection