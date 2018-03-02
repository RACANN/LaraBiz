@extends('layouts.master')
@section('content')

    <form method="POST" action="/employees/{{$employee->id}}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="field">
            <label class="label">Employee Number</label>
            <div class="control">
                <input class="input" type="text" name="employee_number" maxlength="4" value="{{$employee->employee_number}}" required>
            </div>
        </div>
        <div class="field">
            <label class="label">First Name</label>
            <div class="control">
                <input class="input" type="text" name="first_name" value="{{$employee->first_name}}" required>
            </div>
        </div>
        <div class="field">
            <label class="label">Last Name</label>
            <div class="control">
                <input class="input" type="text"  name="last_name" value="{{$employee->last_name}}" required>
            </div>
        </div>
        <div class="field">
            <label class="label">Social Security Number</label>
            <div class="control">
                <input class="input" type="text" name="ssn" value="{{$employee->ssn}}" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Birth Date</label>
            <div class="control">
                <input class="input" type="date" name="birth_date" value="{{$employee->birth_date}}" required>
            </div>
        </div>
        <div class="field">
            <label class="label">Hire Date</label>
            <div class="control">
                <input class="input" type="date" name="hire_date" value="{{$employee->hire_date}}" required>
            </div>
        </div>
        <div class="field">
            <label class="label">Phone</label>
            <div class="control">
                <input class="input" type="text" name="phone" value="{{$employee->phone}}" required>
            </div>
        </div>
        <div class="field">
            <label class="label">Email</label>
            <div class="control">
                <input class="input" type="email" name="email" value="{{$employee->email}}" required>
            </div>
        </div>
        <div class="field">
            <label class="label">Pay</label>
            <div class="control">
                <input class="input" type="text" name="pay" value="{{$employee->pay}}" required>
            </div>
        </div>
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link" type="submit">Edit Employee Info</button>
            </div>
            <div class="control">
                <a href="/employees" class="button is-link">Cancel</a>
            </div>
        </div>
    </form>
@endsection

