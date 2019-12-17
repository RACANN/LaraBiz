@extends('layouts.master')
@section('content')

    @if (session('exists'))
        <div class="notification is-danger">
            {{ session('exists') }}
        </div>
    @endif

    <form method="POST" action="/shifts">
        {{ csrf_field() }}
        <input type="hidden" id="origin" name="origin" value="manager">
        <div class="field">
            <label class="label">Employee Number</label>
            <div class="control">
                <input @click="showClockIn" class="input" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" name="employee_number" maxlength="4" required>
            </div>
            <br />
            <div class="control has-text-centered">
                <button class="button is-link is-outlined is-rounded" type="submit">Enter</button>
            </div>
        </div>
        <div style="display: none" class="field is-grouped">
            <div class="control">
                <button class="button is-link" type="submit">Add New Employee</button>
            </div>
            <div class="control">
                <a href="/employees" class="button is-link">Cancel</a>
            </div>
        </div>
    </form>
@endsection

