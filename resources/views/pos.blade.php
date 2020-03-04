@extends('layouts.master')
@section('content')
    <div id="pos">
        <nav class="panel">
            <p class="panel-heading">
                Point Of Sale
            </p>
            <p class="panel-tabs">
                <a id="newSaleTab" class="is-active" @click="newSale">New Sale</a>
                <a id="pastSalesTab" @click="pastSales">Past Sales</a>
            </p>
            <div class="container" id="pastSalesContainer">
                <div class="panel-block" id="past_sales_content">

                </div>
            </div>
            <div class="container" id="newSaleContainer">
                <div id="panel-block">
                    <h2>Employee: @{{ employee.id + ' ' + employee.firstName + ' '+employee.lastName}}</h2>
                </div>
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
                <p class="control">Enter total amount paid</p>
                    <input class="input" type="text" placeholder="Enter Pay Amount" v-model="paid">
            </div>
            <div class="panel-block">
                <button class="button is-link is-outlined is-fullwidth" @click="completeSale">
                    Complete Sale
                </button>
            </div>
            </div>
        </nav>
    </div>

@endsection
@section('custom-js')
    <script>
        var app = new Vue({
            el: '#pos',
            data: {
                employee: {id: '', firstName : '', lastName :  '', employeeNumber : ''},
                upc: '',
                total: 0,
                paid: 0,
                products: [],
                sales: []
            },
            mounted(){
                let employee_number = prompt("Enter Employee Number: ");
                if(employee_number != null){
                    this.getEmployee(employee_number);
                }else{
                    alert('You must enter Employee Number to use Point Of Sale.');
                    alert('You will be redirected to the home page now. Please know your employee number before trying again');
                    window.location.href = "/";
                }
                $('#pastSalesContainer').hide();
                this.getPastSales();

                console.log(this.sales);
            },
            methods: {
                addItem() {
                    $.ajax({
                        url: '/search/product/'+this.upc,
                        method: 'POST',
                        data: {
                            "_token" : "{{csrf_token()}}"
                        }
                    }).done(data => {
                        this.products.push(data);
                        this.total += data.price;
                        console.log(this.total);
                    })
                },
                getPastSales() {
                    $.ajax({
                        url: '/orders/show/all',
                        method: 'POST',
                        data: {
                            "_token" : "{{csrf_token()}}"
                        }
                    }).done(data => {
                        $("#past_sales_content").append(data);
                        $("#orders").scroll();

                    })
                },
                getEmployee(employee_number) {
                    $.ajax({
                        url: '/search/employee/'+employee_number,
                        method: 'POST',
                        data: {
                            "_token" : "{{csrf_token()}}"
                        }
                    }).done(data => {
                        this.employee.id = data.id;
                        this.employee.employeeNumber = data.employee_number;
                        this.employee.firstName = data.first_name;
                        this.employee.lastName = data.last_name;
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
                                "employee_id" : this.employee.id,
                                "products" : this.products,
                                'paytype' : $("input[name=paytype]").val(),
                                "price" : this.price,
                                "paid" : this.paid,
                                "total" : this.total

                            }
                        })
                        alert('Sale completed.');
                        let payType = $("input[name=paytype]:checked").val();
                        console.log(payType);
                        payType==='credit' ? alert('Give them thier credit card receipt') : alert('Give them $' + (this.paid-this.total) + " change back.")
                        this.products = [];
                        this.total = 0;
                        this.paid = 0;
                        this.upc = '';
                    }else{
                        alert("You need to collect at least $" + this.total)
                    }
                },
                newSale() {

                    $("#pastSalesTab").removeClass('is-active');
                    $("#pastSalesContainer").hide();

                    $("#newSaleTab").addClass('is-active');
                    $("#newSaleContainer").slideDown();

                },
                pastSales() {

                    $("#newSaleTab").removeClass('is-active');
                    $("#newSaleContainer").hide();

                    $("#pastSalesTab").addClass('is-active');
                    $("#pastSalesContainer").slideDown();
                }

            }

        })
    </script>
@endsection