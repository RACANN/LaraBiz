@extends('layouts.master')
@section('content')


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
    <a class="button is-primary" href="/employee/new">Add New Employee</a>
  </p>
@foreach($employees as $employee)
    
    	@include('employees.employee')
   
@endforeach  
</nav>
@endsection
