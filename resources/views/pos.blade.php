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

                <div style="min-height: 200px">
                    <ul>
                        <li v-for="(product, index) in products" class="list-item">@{{product.name + ' | $' + product.price}} <i @click="removeItem(index)" style="color:#ff0000" class="fa fa-times" aria-hidden="true"></i></li>
                    </ul>
                </div>
            </div>
            <div class="panel-block">
                <div class="control">
                    <p>Total : $@{{ total }}</p>
                </div>
            </div>

            <label class="panel-block">
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="paytype" value="cash" checked>
                        Cash
                    </label>
                    <label class="radio">
                        <input type="radio" name="paytype" value="credit">
                        Credit
                    </label>
                </div>
            </label>
            <div class="panel-block">
                <p class="control">Enter total amount paid</p>
                    <input class="input" type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter Pay Amount" v-model="paid">
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
                        })
                        alert('Sale completed.');
                        var payType = $("input[name=paytype]").val();
                        payType=='credit' ? alert('Give them thier credit card receipt') : alert('Give them $' + (this.paid-this.total) + " change back.")
                        this.products = [];
                        this.total = 0;
                        this.paid = 0;
                        this.upc = '';
                    }else{
                        alert("You need to collect at least $" + this.total)
                    }
                }

            }

        })
    </script>
@endsection