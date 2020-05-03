@extends('layouts.minimal')
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
                <div class="panel-block" id="upcSearch">
                    <p class="control has-icons-left">
                        <input class="input" type="text" placeholder="Enter upc" v-model="upc">
                        <span class="icon is-left">
                <i class="fa fa-search" aria-hidden="true"></i>
                    </span>
                    </p>
                <button class="button is-info" @Click="addItem">Search</button>
            </div>
                <div class="panel-block" id="itemSearch">
                    <p class="control has-icons-left">
                        <input class="input" type="text" placeholder="Enter Item Name" v-model="item_name">
                        <span class="icon is-left">
                <i class="fa fa-search" aria-hidden="true"></i>
                    </span>
                    </p>
                    <button class="button is-info" @Click="addItem">Search</button>
                </div>
                <div class="panel-block">
                        <div class="control">
                            <label class="radio">
                                <input type="radio" name="searchType" value="upc" @click="enableUpcSearch" checked>
                                UPC
                            </label>
                            <label class="radio">
                                <input type="radio" name="searchType" value="item_name"  @click="enableItemNameSearch">
                                Name
                            </label>
                        </div>

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
                item_name: '',
                searchType: 'upc',
                total: 0,
                paid: 0,
                products: [],
                sales: []
            },
            mounted(){
                this.getEmployee();
                $('#pastSalesContainer').hide();
                $('#itemSearch').hide();
                this.getPastSales();
            },
            methods: {
                addItem() {
                    var url;
                    url = this.searchType === 'upc' ? '/search/product/upc/'+this.upc : '/search/product/name/'+this.item_name;
                    $.ajax({
                        url: url,
                        method: 'POST',
                        data: {
                            "_token" : "{{csrf_token()}}"
                        }
                    }).done(data => {
                        if(data.product_found === false){
                            Swal.fire('Product not found.');
                        }else{
                            this.products.push(data);
                            this.total += data.price;
                            console.log(this.total);
                        }
                    })
                },
                enableUpcSearch() {
                    this.searchType = 'upc';
                    $("#itemSearch").hide();
                    $("#upcSearch").slideDown();
                },
                enableItemNameSearch() {
                    this.searchType = 'item_name';
                    $("#upcSearch").hide();
                    $("#itemSearch").slideDown();
                },
                employeeLogIn() {
                    let employee_number = prompt("Enter Employee Number: ");
                    if(employee_number != null){
                        this.getEmployee(employee_number);
                    }else{
                        alert('You must enter Employee Number to use Point Of Sale.');
                        alert('You will be redirected to the home page now. Please know your employee number before trying again');
                        window.location.href = "/";
                    }
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
                getEmployee() {
                    $.ajax({
                        url: '/search/employee/{{$employee_number}}',
                        method: 'POST',
                        data: {
                            "_token" : "{{csrf_token()}}"
                        }
                    }).done(data => {
                        if(data.employee_found === false){
                            Swal.fire("Employee not found.");
                            location.reload();

                        }else{
                            this.employee.id = data.id;
                            this.employee.employeeNumber = data.employee_number;
                            this.employee.firstName = data.first_name;
                            this.employee.lastName = data.last_name;
                        }
                    })
                },
                removeItem(index) {
                    this.total -= this.products[index].price;
                    this.products.splice(index,1)
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
                        Swal.fire('Sale completed.');
                        let payType = $("input[name=paytype]:checked").val();
                        console.log(payType);
                        payType==='credit' ? Swal.fire('Give them their credit card receipt') : Swal.fire('Give them $' + (this.paid-this.total) + " change back.")
                        this.products = [];
                        this.total = 0;
                        this.paid = 0;
                        this.upc = '';
                    }else{
                        Swal.fire("You need to collect at least $" + this.total)
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