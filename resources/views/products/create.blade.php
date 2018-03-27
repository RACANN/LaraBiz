@extends('layouts.master')
@section('content')
<h1 class="subtitle">New Product</h1>
<form method="POST" action="/products">
  {{ csrf_field() }}
<div class="field">
  <label>UPC</label>
  <div class="control">
    <input class="input" type="text"  name="upc">
  </div>
</div>

  <div class="field">
    <label>Name</label>
    <div class="control">
      <input class="input" type="text" name="name" required>
    </div>
  </div>

  <div class="field">
    <label>Description</label>
    <div class="control">
      <input class="input" type="text"  name="description" required>
    </div>
  </div>

  <div class="field">
    <label>Cost</label>
    <div class="control">
      <input class="input" type="text" name="cost" required>
    </div>
  </div>

<div class="field">
    <label>Price</label>
    <div class="control">
      <input class="input" type="text" name="price" required>
    </div>
  </div>
<div class="field is-grouped">
  <div class="control">
    <button class="button is-link" type="submit">Add Item</button>
  </div>
  <div class="control">
    <a href="/products" class="button is-link">Cancel</a>
  </div>
</div>
</form>
@endsection

