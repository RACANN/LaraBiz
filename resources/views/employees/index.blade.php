@extends('layouts.master')
@section('custom-css')
    <style>
        .close{}
    </style>
@endsection
@section('content')

@include("employees.modals.add_employee_modal")
    <div class="navbar-menu">
        <div class="navbar-end">
            <div class="button is-info is-outlined is-rounded" id="btn_add_new">Add New Employee</div>
        </div>
    </div>
<h1 class="title">Employees</h1>
    <hr>
  <table id="employees" class="display">
        <thead>
        <tr>
            <th>Employee Id</th>
            <th>Employee Number</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Employee Email</th>
            <th>Phone Number</th>
            <th></th>
        </tr>
        </thead>
  @foreach($employees as $employee)

    <tr>
        <td><a href="/employees/{{$employee->id}}/edit">{{$employee->id}}</a></td>
      <td>{{$employee->employee_number}}</td>
      <td>{{$employee->first_name}}</td>
      <td>{{$employee->last_name}}</td>
      <td>{{$employee->email}}</td>
      <td>{{$employee->phone}}</td>
      <td><i style="color:#9db2e0" class="fa fa-trash fa-lg" data-first-name ="{{$employee->first_name}}" data-last-name ="{{$employee->last_name}}" data-id="{{$employee->id}}"></i></td>
    </tr>

  @endforeach

</table>
<br>
<hr>
<a href="/exports/employees"><i class="fa fa-file-csv fa-2x is-pulled-right"></i></a>
<br>

@endsection

@section('custom-js')
    <script src="{{asset('/js/models/employee.js')}}"></script>
  <script>
      $(document).ready( function () {

          var employee_table = $('#employees').DataTable({

          });
          var employee = new Employee();
          employee.registerModal("#add_new_modal", "#btn_add_new", ".close");
          employee.registerDelete('.fa-trash', "{{csrf_token()}}");
      } );
  </script>
@endsection

