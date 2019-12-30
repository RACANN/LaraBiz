@extends('layouts.master')
@section('content')
    <h1 class="title">@section('title', 'Orders')</h1>
    <div class="navbar-menu">
        <div class="navbar-end">
            <div class="button is-success" id="btn_add_new">Add New</div>
        </div>
    </div>

    <hr>

    <div id="orders">

        @foreach($orders as $order)
            <h2>Order #{{$order->id}} | {{$order->order_time}}</h2>
            <div>
                <ul>
                    @foreach($order->orderDetails as $od)
                        <li>{{$od->product()->name}} | {{$od->product()->price}}</li>
                    @endforeach
                </ul>

            </div>
        @endforeach
    </div>

@section('custom-js')
    <script>
        $(document).ready(function() {

            $("#orders").accordion();
        });
    </script>
@endsection

@endsection