@extends('layouts.master')
@section('content')

    @foreach($shifts as $shift)

        @include('shifts.shift')

    @endforeach

@endsection