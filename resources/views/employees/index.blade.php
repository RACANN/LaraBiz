@extends('layouts.master')
@section('content')

<div class="modal" id="createEmployeeForm">
  <div class="modal-background"></div>
  <div class="modal-content">
<form method="POST" action="/employees">
  {{ csrf_field() }}
  <div class="field">
    <label class="label has-text-white">Employee Number</label>
    <div class="control">
      <input class="input" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" name="employee_number" maxlength="4" required>
    </div>
  </div>
<div class="field">
  <label class="label has-text-white">First Name</label>
  <div class="control">
    <input class="input" type="text" name="first_name" required>
  </div>
</div>
  <div class="field">
    <label class="label has-text-white">Last Name</label>
    <div class="control">
      <input class="input" type="text"  name="last_name" required>
    </div>
  </div>
  <div class="field">
    <label class="label has-text-white">Social Security Number</label>
    <div class="control">
      <input class="input" type="text" name="ssn" required>
    </div>
  </div>
  <div class="field">
    <label class="label has-text-white">Birth Date</label>
    <div class="control">
      <input class="input" type="date" name="birth_date" required>
    </div>
  </div>
  <div class="field">
    <label class="label has-text-white">Hire Date</label>
    <div class="control">
      <input class="input" type="date" name="hire_date" required>
    </div>
  </div>
  <div class="field">
    <label class="label has-text-white">Phone</label>
    <div class="control">
      <input class="input" type="text" name="phone" required>
    </div>
  </div>
  <div class="field">
    <label class="label has-text-white">Email</label>
    <div class="control">
      <input class="input" type="email" name="email" required>
    </div>
  </div>
  <div class="field">
    <label class="label has-text-white">Pay</label>
    <div class="control">
      <input class="input" type="text" name="pay" required>
    </div>
  </div>
  <div class="field">
    <label class="label has-text-white">Position</label>
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
  </div>
  <button class="modal-close is-large" aria-label="close" @click="close"></button>
</div>

<nav class="panel">
  <p class="panel-heading">
    Employees
  </p>
  <div class="panel-block">
    <p class="control has-icons-left">
      <input class="input is-small" type="text" placeholder="search">
      <span class="icon is-small is-left">
        <i class="fa fa-search"></i>
      </span>
    </p>
  </div>
  <p class="panel-tabs">
    <a class="is-primary is-outlined"><span class="icon is-small is-left">
        <i class="fa fa-check"></i>
      </span></a>
    <a class="is-primary is-outlined"><span class="icon is-small is-left">
        <i class="fa fa-sort"></i>
      </span></a>
    <a class="is-primary is-outlined"><span class="icon is-small is-left">
        <i class="fa fa-plus" @click="openAdd()"></i>
      </span></a>
    <a class="is-primary is-outlined"><span class="icon is-small is-left">
        <i class="fa fa-dollar"></i>
      </span></a>
  </p>
@foreach($employees as $employee)
    
    	@include('employees.employee')
   
@endforeach  
</nav>
@endsection
