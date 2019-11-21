@extends('layouts.master')
@section('content')
    <h1>Edit Product</h1>
    <form method="POST" action="/products/{{$product->id}}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="field">
            <label class="label is-danger">UPC</label>
            <div class="control">
                <input class="input" type="text" name="upc" value="{{$product->upc}}" required>
            </div>
        </div>

        <div class="field">
            <label class="label is-danger">Name</label>
            <div class="control">
                <input class="input" type="text" name="name" value="{{$product->name}}" required>
            </div>
        </div>

        <div class="field">
            <label class="label is-danger">Description</label>
            <div class="control">
                <input class="input" type="text"  name="description" value="{{$product->description}}" required>
            </div>
        </div>

        <div class="field">
            <label class="label is-danger">Cost</label>
            <div class="control">
                <input class="input" type="text" name="cost"  value="{{$product->cost}}" required>
            </div>
        </div>

        <div class="field">
            <label class="label is-danger">Price</label>
            <div class="control">
                <input class="input" type="text" value="{{$product->price}}" name="price" required>
            </div>
        </div>
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link" type="submit">Edit Item</button>
            </div>
            <div class="control">
                <a href="/products" class="button is-link">Cancel</a>
            </div>
        </div>
    </form>
@endsection

