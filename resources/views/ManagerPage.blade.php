@extends('layouts.master')
@section('content')
    <br />
    <div class="tile is-ancestor">
        <div class="tile is-vertical is-8">
            <div class="tile">
                <div class="tile is-parent is-vertical">
                    <article class="tile is-child notification is-primary">
                            <h1 class="title">Employees</h1>



                    </article>
                    {{--<article class="tile is-child notification is-warning">--}}
                    {{--<p class="title">...tiles</p>--}}
                    {{--<p class="subtitle">Bottom tile</p>--}}
                    {{--</article>--}}
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child notification is-info">
                        <h1 class="title">Inventory</h1>

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
                <h1 class="title">Sales</h1>

            </article>
        </div>
    </div>
    <br/>

@endsection
@section('footer')
@endsection