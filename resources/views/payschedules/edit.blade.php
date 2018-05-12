@extends('layouts.master')
@section('content')

    <form method="POST" action="/orders/{{$merchantses->id}}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input class="input" type="text" name="name" maxlength="4" value="{{$merchantsession->name}}" required>
            </div>
        </div>
        <div class="field">
            <label class="label">Merchant Session Start</label>
            <div class="control">
                <input class="input" type="text" name="merchant_session_start" value="{{$merchantsession->merchant_session_start}}" required>
            </div>
        </div>
        <div class="field">
            <label class="label">Merchant Session End</label>
            <div class="control">
                <input class="input" type="text"  name="merchant_session_end" value="{{$merchantsession->merchant_session_end}}" required>
            </div>
        </div>
        <div class="field">
            <label class="label">Cash Start</label>
            <div class="control">
                <input class="input" type="text" name="ssn" value="{{$merchantsession->cash_start}}" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Cash End</label>
            <div class="control">
                <input class="input" type="date" name="birth_date" value="{{$merchantsession->cash_end}}" required>
            </div>
        </div>
        <div class="control">
            <label class="radio">
                <input type="radio" name="open" value="true">
                Yes
            </label>
            <label class="radio">
                <input type="radio" name="open" value="false">
                No
            </label>
        </div>

        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link" type="submit">Edit Merchant Session</button>
            </div>
            <div class="control">
                <a href="/employees" class="button is-link">Cancel</a>
            </div>
        </div>
    </form>
@endsection