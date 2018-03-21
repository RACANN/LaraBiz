@extends('layouts.master')
@section('content')
    <h1>New Products</h1>
    <form method="POST">
        {{ csrf_field() }}
        <div class="field">
            <label class="label is-danger">UPC</label>
            <div class="control">
                <input class="input" type="text" value="" name="upc">
            </div>
        </div>

        <div class="field">
            <label class="label is-danger">Name</label>
            <div class="control">
                <input class="input" type="text" name="name" required>
            </div>
        </div>

        <div class="field">
            <label class="label is-danger">Description</label>
            <div class="control">
                <input class="input" type="text"  name="description" required>
            </div>
        </div>

        <div class="field">
            <label class="label is-danger">Cost</label>
            <div class="control">
                <input class="input" type="text" name="cost" required>
            </div>
        </div>

        <<div class="field">
            <label class="label is-danger">Price</label>
            <div class="control">
                <input class="input" type="text" value="" name="upc">
            </div>
        </div>
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link">Add Item</button>
            </div>
            <div class="control">
                <button class="button is-text">Cancel</button>
            </div>
        </div>
    </form>
@endsection

