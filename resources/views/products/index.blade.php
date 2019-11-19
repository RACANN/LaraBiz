@extends('layouts.master')
@section('content')

    <div class="navbar-menu">
        <div class="navbar-end">
            <div class="button is-success">Add New</div>
        </div>
    </div>
    <hr>

    <table id="products" class="display">
        <thead>
        <tr>
            <th>Upc</th>
            <th>Name</th>
            <th>Description</th>
            <th>Cost</th>
            <th>Price</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)

            <tr>
                <td>{{$product->upc}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->cost}}</td>
                <td>{{$product->price}}</td>
                <td>Edit | Delete</td>

            </tr>

        @endforeach
        </tbody>
    </table>

@section('custom-js')
    <script>
        //getData();
        $(document).ready(function() {

            $('#products').DataTable({
                "columnDefs": [
                    { "orderable": false, "targets": 5 }
                ]
            });

        });
    </script>
@endsection

@endsection
