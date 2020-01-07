@extends('layouts.master')
@section('content')
@include('orders.modals.add_order_modal')
    <h1 class="title">@section('title', 'Orders')</h1>
    <div class="navbar-menu">
        <div class="navbar-end">
            <div class="button is-success" id="btn_add_new">Add New</div>
        </div>
    </div>

    <hr>

    <div id="orders">

        @foreach($orders as $order)
            <h1>Order #: {{$order->id}} | From:  {{$order->order_time}}</h1>
            <div>
                <p>Order Total: ${{$order->total}} | Paytype: {{$order->paytype}}</p>
                <ul>
                @foreach($order->orderDetails as $od)
                    @foreach($od->products() as $product)
                            <li class="list-item">{{$product->name}}</li>
                    @endforeach

                @endforeach
                </ul>
                <br>
                <i style="color:#9db2e0" class="fa fa-trash fa-lg" data-id="{{$order->id}}"></i>
            </div>
            {{--<div class="card">--}}
                {{--<div class="card-content">--}}
                    {{--<h1>Order #: {{$order->id}}</h1>--}}
                    {{--<ul>--}}
                        {{--@foreach($order->orderDetails as $od)--}}
                            {{--<li class="list-item">{{$od->product()->first()->name}}</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        @endforeach
    </div>

@section('custom-js')
    <script>
        $(document).ready(function() {

          $("#orders").accordion();

            $('#btn_add_new').on("click", function(){
                $('#add_new_modal').addClass('is-active').fadeIn();
            });
            $('#btn_cancel_add_new').on("click", function(){
                $('#add_new_modal').removeClass('is-active')
            });
            $('#close_add_new').on("click", function(){
                $('#add_new_modal').removeClass('is-active')
            });
            $('.fa-trash').on('click', function(e){
                e.preventDefault();
                var id = $(this).data('id');
                console.log($(this).data('id'));
                if(confirm("Are you sure you want to delete order #:"+ id + "?")){
                    $.ajax({
                        url: '/orders/'+id,
                        method: 'DELETE',
                        data: {
                            "_token" : "{{csrf_token()}}"
                        }
                    });
                    location.reload();
                }


            });
        });
    </script>
@endsection

@endsection