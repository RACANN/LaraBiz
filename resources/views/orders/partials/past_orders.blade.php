<div id="orders" class="w-100">
    @foreach($orders as $order)
        <h1>Order #: {{$order->id}} | From:  {{$order->order_time}}</h1>
        <div>

            <ul>
                @foreach($order->orderDetails as $od)
                    @foreach($od->products() as $product)
                        <li class="list-item">{{$product->name}} | ${{$product->price}}</li>
                    @endforeach

                @endforeach
            </ul>
            <br>
            <p>Order Total: ${{$order->total}} | Amount Paid: ${{$order->paid}} | Paytype: {{$order->paytype}}</p>
            <hr>
        </div>
    @endforeach
</div>