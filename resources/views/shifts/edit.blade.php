@extends('layouts.master')
@section('content')
    <h1>Edit Shift</h1>
    <form method="POST" action="/shifts/{{$shift->id}}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="field">
            <label class="label is-danger">Shift Start</label>
            <div class="control">
                <input class="input" type="datetime-local" name="shift_start" value="{{$shift->convertToHtmlDateTime($shift->shift_start)}}" required>
            </div>
        </div>

        <div class="field">
            <label class="label is-danger">Break Start</label>
            <div class="control">
                <input class="input" type="datetime-local" name="break_start" value="{{$shift->convertToHtmlDateTime($shift->break_start)}}">
            </div>
        </div>

        <div class="field">
            <label class="label is-danger">Break End</label>
            <div class="control">
                <input class="input" type="datetime-local"  name="break_end" value="{{$shift->convertToHtmlDateTime($shift->break_end)}}">
            </div>
        </div>

        <div class="field">
            <label class="label is-danger">Shift End</label>
            <div class="control">
                <input class="input" type="datetime-local" name="shift_end"  value="{{$shift->convertToHtmlDateTime($shift->shift_end)}}">
            </div>
        </div>

        <div class="field">
            <label class="label is-danger">Open</label>
            <div class="control">
                <label class="radio">
                    <input type="radio" name="open"  value=1 checked>
                    Yes
                </label>
                <label class="radio">
                    <input type="radio" name="open" value=0>
                    No
                </label>
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