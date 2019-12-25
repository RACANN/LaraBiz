@extends('layouts.master')
@section('content')
    <div id="pos">
        <nav class="panel">
            <p class="panel-heading">
                Sale
            </p>
            <p class="panel-tabs">
                <a class="is-active">New Sale</a>
                <a>Past Sales</a>
            </p>
            <div class="panel-block">
                <p class="control has-icons-left">
                    <input class="input" type="text" placeholder="Enter upc code" v-model="upc">
                    <span class="icon is-left">
        <i class="fa fa-search" aria-hidden="true"></i>
      </span>
                </p>
                <button class="button is-primary" @Click="addItem">Search</button>
            </div>
            <h1>Sale Items</h1>

            <div class="panel-block">

                <ul>
                    <li v-for="(product, index) in products" class="list-item">@{{product.name + ' | $' + product.price}} <i @click="removeItem(index)" style="color:#ff0000" class="fa fa-times" aria-hidden="true"></i></li>
                </ul>
                {{--<div style="min-height: 200px">--}}
                    {{--<div class="card">--}}
                        {{--<div class="card-content"></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>

            <label class="panel-block">
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="paytype" value="cash">
                        Cash
                    </label>
                    <label class="radio">
                        <input type="radio" name="paytype" value="credit">
                        Credit
                    </label>
                </div>
            </label>
            <div class="panel-block">
                <p class="control has-icons-left">
                    <input class="input" type="tel" placeholder="Enter Pay Amount" v-model="paid">
            </div>
            <div class="panel-block">
                <button class="button is-link is-outlined is-fullwidth" @click="completeSale">
                    Complete Sale
                </button>
            </div>
        </nav>
    </div>

@endsection
@section('custom-js')
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
                    })
                    alert('sale cpmpleted!')
                }

            }

        })
    </script>
@endsection