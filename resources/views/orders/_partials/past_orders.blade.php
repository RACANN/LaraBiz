<div id="orders" class="w-100">
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
        </div>
    @endforeach
</div>