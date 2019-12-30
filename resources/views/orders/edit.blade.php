@extends('layouts.master')
@section('content')
    <h1>Edit Order</h1>
    <form method="POST" action="/products/{{$order->id}}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
    </form>
@endsection

