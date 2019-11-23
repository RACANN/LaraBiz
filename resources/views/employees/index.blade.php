@extends('layouts.master')
@section('content')

@include("employees.modals.add_employee_modal")
    <div class="navbar-menu">
        <div class="navbar-end">
            <div class="button is-success" id="btn_add_new">Add New</div>
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
  <hr>

@endsection

@section('custom-js')
  <script>
      $(document).ready( function () {
          var employee_table = $('#employees').DataTable();
          $('#btn_add_new').on("click", function(){
            $('#add_new_modal').addClass('is-active').fadeIn();
          });
          $('#btn_cancel_add_new').on("click", function(){
              $('#add_new_modal').removeClass('is-active')
          });
          $('#close_add_new').on("click", function(){
              $('#add_new_modal').removeClass('is-active')
          });
          $('.fa-trash').on('click', function(e){
              e.preventDefault();
              var id = $(this).data('id');
              var firstName = $(this).data('first-name');
              var lastName= $(this).data('last-name');

             console.log($(this).data('id'));
            if(confirm("Are you sure you want to delete "+firstName + " " + lastName + "?")){
                $.ajax({
                    url: '/employees/'+id,
                    method: 'DELETE',
                    data: {
                        "_token" : "{{csrf_token()}}"
                    }
                });
                location.reload();
            }


          });
      } );
  </script>
@endsection

