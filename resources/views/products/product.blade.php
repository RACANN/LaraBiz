<div class="box is-success border-primary">
    <h1 class="subtitle"><strong>Product Number: {{$product->id}}</strong></h1>
    <hr size="2" />
    <ul class="menu-list">
        <li><strong>UPC: {{$product->upc}} </strong> </li>
            <hr />

            <li><strong>Product Name: {{$product->name}}</strong> </li>
            <hr />
            <li><strong>Product Description: {{$product->description}}</strong> </li>
            <hr />
            <li><strong>Product Price: ${{$product->price}}</strong> </li>
            <hr />
            <li><strong>Product Cost: ${{$product->cost}}</strong> </li>
            <hr />
            <li><strong>Product Profit: ${{($product->price - $product->cost)}}</strong> </li>
    </ul>
</div>




