<div class="box is-success">
    <article class="media">
        <div class="media-content">
            <div class="content">
                <ul>
                    @foreach($products as $product)
                        <li>Product UPC: {{$product->upc}}</li>
                        <li>Product Name: {{$product->name}}</li>
                        <li>Product Description: {{$product->description}}</li>
                        <li>Product Price: {{$product->price}}</li>
                        <li>Product Cost: {{$product->cost}}</li>
                        <li>Product Profit: {{($product->price - $product->cost)}}</li>
                    @endforeach
                </ul>


            </div>
            <nav class="level is-mobile">
                <div class="level-left">
                    <a class="level-item">
                        <span class="icon is-small"><i class="fas fa-reply"></i></span>
                    </a>
                    <a class="level-item">
                        <span class="icon is-small"><i class="fas fa-retweet"></i></span>
                    </a>
                    <a class="level-item">
                        <span class="icon is-small"><i class="fas fa-heart"></i></span>
                    </a>
                </div>
            </nav>
        </div>
    </article>
</div>