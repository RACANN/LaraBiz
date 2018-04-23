@extends('layouts.master')
@section('content')

    <form method="POST" action="/merchant">
        {{ csrf_field() }}
        <div class="field">
            <label class="label">Employee Number</label>
            <div class="control">
                <input class="input" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" name="employee_number" maxlength="4" required>
            </div>
        </div>
        <div class="field">
            <label class="label">Start Cash</label>
            <div class="control">
                <input class="input" type="date" name="birth_date" required>
            </div>
        </div>
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link" type="submit">Create Merchant Session</button>
            </div>
            <div class="control">
                <a href="/employees" class="button is-link">Cancel</a>
            </div>
        </div>
    </form>
@endsection

