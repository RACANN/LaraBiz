@extends('layouts.master')
@section('content')
@include('orders.modals.add_order_modal')
    <h1 class="title">@section('title', 'Orders')</h1>
    <div class="navbar-menu">
        <div class="navbar-end">
            <div class="button is-info is-outlined is-rounded" id="btn_add_new">Add New Order</div>
        </div>
    </div>

    <hr>

    <div id="orders">
        @foreach($orders as $order)
            <h1>Order #: {{$order->id}} | From:  {{$order->order_time}}</h1>
            <div>
                <ul>
                @foreach($order->orderDetails as $od)
                            <li class="list-item">{{$od->product()->name}} | ${{$od->product()->price}}</li>
                @endforeach
                </ul>
                <br>
                <p>Order Total: ${{$order->total}} | Amount Paid: ${{$order->paid}} | Paytype: {{$order->paytype}}</p>
                <hr>
                <i style="color:#9db2e0" class="fa fa-trash fa-lg" data-id="{{$order->id}}"></i>
            </div>
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


                Swal.fire({
                    title: "Are you sure you want to delete order #:"+ id + "?",
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: '/orders/'+id,
                            method: 'DELETE',
                            data: {
                                "_token" : "{{csrf_token()}}",
                            }
                        });

                        Swal.fire(
                            'Deleted!',
                            'Order has been deleted.',
                            'success'
                        )
                        location.reload();
                    }
                })



            });
        });
    </script>
    <script>
        var app = new Vue({
            el: '#pos',
            data: {
                upc: '',
                total: 0,
                paid: 0,
                products: []
            },
            mounted(){

            },
            methods: {
                addItem() {
                    $.ajax({
                        url: '/search/product/'+this.upc,
                        method: 'GET'
                    }).done(data => {
                        this.products.push(data);
                        this.total += data.price;
                        console.log(this.total);
                    })
                },
                removeItem(index) {
                    this.total -= this.products[index].price;
                    this.products.splice(index,1)
                    console.log(this.total);
                },
                completeSale() {
                    if(this.paid >= this.total){
                        $.ajax({
                            url: '/orders',
                            method: 'POST',
                            data: {
                                "_token" : "{{csrf_token()}}",
                                "products" : this.products,
                                'paytype' : $("input[name=paytype]").val(),
                                "price" : this.price,
                                "paid" : this.paid,
                                "total" : this.total
                            }
                        }
                        Swal.fire('Sale Completed!');
                        var payType = $("input[name=paytype]").val();
                        payType=='credit' ? Swal.fire('Give them their credit card receipt') : Swal.fire('Give them $' + (this.paid-this.total) + " change back.")
                        this.products = [];
                        this.total = 0;
                        this.paid = 0;
                        this.upc = '';
                        location.reload();
                    }else{
                        Swal.fire("You need to collect at least $" + this.total)
                    }
                }

            }

        })
    </script>
@endsection

@endsection