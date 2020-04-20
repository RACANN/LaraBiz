@extends('layouts.limited')
@section('content')
    <div class="container">
        <article class="message">
            <div class="message-header">
                <p>Action Needed</p>
                <button class="delete" aria-label="delete"></button>
            </div>
            <div class="message-body">
                Your employee info has not been entered into the system. Please contact your manager.
            </div>
        </article>
    </div>
@endsection
@section('footer')
@endsection