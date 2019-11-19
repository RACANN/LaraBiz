@extends('layouts.master')
@section('content')


    <div class="navbar-menu">
        <div class="navbar-end">
            <div class="button is-success">Add New</div>
        </div>
    </div>
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
      <td>{{$employee->id}}</td>
      <td>{{$employee->employee_number}}</td>
      <td>{{$employee->first_name}}</td>
      <td>{{$employee->last_name}}</td>
      <td>{{$employee->email}}</td>
      <td>{{$employee->phone}}</td>
      <td>Edit | Delete</td>
    </tr>

  @endforeach

</table>
  <hr>

@endsection

@section('custom-js')
  <script>
      $(document).ready( function () {
          $('#employees').DataTable();
      } );
  </script>
@endsection

