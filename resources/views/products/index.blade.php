@extends('layouts.master')
@section('content')
    @include('products.modals.add_product_modal')
    <h1 class="title">@section('title', 'Products')</h1>
    <div class="navbar-menu">
        <div class="navbar-end">
            <a class="button is-success is-outlined is-rounded" href="/categories">Manage Categories</a>
            <div class="button is-success is-outlined is-rounded" id="btn_add_new">Add New Product</div>
        </div>
    </div>

    <hr>
    <h1>Products</h1>
    <table id="products" class="display">
        <thead>
        <tr>
            <th>Upc</th>
            <th>Name</th>
            <th>Description</th>
            <th>Cost</th>
            <th>Price</th>
            <th>Profit</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($product_data['products'] as $product)
            <?php $product->profit() > 0 ? $color = '#33b322' : ($product->profit() < 0 ? $color='#ff0000': $color = '#000000');?>
            <tr>
                <td><a href="/products/{{$product->id}}/edit">{{$product->upc}}</a></td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{number_format($product->cost, 2)}}</td>
                <td>{{number_format($product->price, 2)}}</td>
                <td><?php echo "<span style='color:".$color."'>";?>{{ number_format($product->profit(), 2)}}<?php echo "</span>" ?></td>
                <td><i style="color:#9db2e0" class="fa fa-trash fa-lg" data-id="{{$product->id}}" data-product-name="{{$product->name}}"></i></td>

            </tr>

        @endforeach
        </tbody>
    </table>
    <br>
    <hr>
    <a href="/exports/products"><i class="fa fa-file-csv fa-2x is-pulled-right"></i></a>
    <br>

@section('custom-js')
    <script>
        //getData();
        $(document).ready(function() {

            $('#products').DataTable({
                "columnDefs": [
                    { "orderable": false, "targets": 6 }
                ]
            });

            $('#btn_add_new').on("click", function(){
                $('#add_new_modal').addClass('is-active').fadeIn();
            });
            $('#btn_cancel_add_new').on("click", function(){
                $('#add_new_modal').removeClass('is-active')
            });
            $('#close_add_new').on("click", function(){
                $('#add_new_modal').removeClass('is-active')
            });
            $(".fa-trash").on("click", function(){
                var id = $(this).data('id');
                var productName = $(this).data('product-name');

                Swal.fire({
                    title: "Are you sure you want to delete "+ productName + "?",
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: '/products/'+id,
                            method: 'DELETE',
                            data: {
                                "_token" : "{{csrf_token()}}"
                            }
                        });

                        Swal.fire(
                            'Deleted!',
                            'Employee has been deleted.',
                            'success'
                        )
                        location.reload();
                    }
                })
            })

        });
    </script>
@endsection

@endsection
