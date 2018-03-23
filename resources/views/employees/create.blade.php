@extends('layouts.master')
@section('content')

<form method="POST" action="/employees">
  {{ csrf_field() }}
  <div class="field">
    <label class="label">Employee Number</label>
    <div class="control">
      <input class="input" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" name="employee_number" maxlength="4" required>
    </div>
  </div>
<div class="field">
  <label class="label">First Name</label>
  <div class="control">
    <input class="input" type="text" name="first_name" required>
  </div>
</div>
  <div class="field">
    <label class="label">Last Name</label>
    <div class="control">
      <input class="input" type="text"  name="last_name" required>
    </div>
  </div>
  <div class="field">
    <label class="label">Social Security Number</label>
    <div class="control">
      <input class="input" type="text" name="ssn" required>
    </div>
  </div>

  <div class="field">
    <label class="label">Birth Date</label>
    <div class="control">
      <input class="input" type="date" name="birth_date" required>
    </div>
  </div>
  <div class="field">
    <label class="label">Hire Date</label>
    <div class="control">
      <input class="input" type="date" name="hire_date" required>
    </div>
  </div>
  <div class="field">
    <label class="label">Phone</label>
    <div class="control">
      <input class="input" type="text" name="phone" required>
    </div>
  </div>
  <div class="field">
    <label class="label">Email</label>
    <div class="control">
      <input class="input" type="email" name="email" required>
    </div>
  </div>
  <div class="field">
    <label class="label">Pay</label>
    <div class="control">
      <input class="input" type="text" name="pay" required>
    </div>
  </div>
  <div class="field">
    <label class="label">Position</label>
    <div class="control">
      <input class="input" type="text" name="position" required>
    </div>
  </div>
<div class="field is-grouped">
  <div class="control">
    <button class="button is-link" type="submit">Add New Employee</button>
  </div>
  <div class="control">
    <a href="/employees" class="button is-link">Cancel</a>
  </div>
</div>
</form>
@endsection

