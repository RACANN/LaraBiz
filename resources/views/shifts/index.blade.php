@extends('layouts.master')
@section('content')
    @include('shifts.modals.add_shift_modal')
    @if (session('employee_exists'))
        <div class="notification is-danger">
            {{ session('employee_exists') }}
        </div>
    @endif
    @if (session('shift_added'))
        <div class="notification is-success">
            {{ session('shift_added') }}
        </div>
    @endif
    @if (session('shift_edited'))
        <div class="notification is-success">
            {{ session('shift_edited') }}
        </div>
    @endif
    <h1 class="title">Shifts</h1>
    <div class="navbar-menu">
        <div class="navbar-end">
            <div class="button is-success is-outlined is-rounded" id="btn_add_new">Add New Shift</div>
        </div>
    </div>
    <hr />
    <table id="shifts">
        <thead>
            <tr>
                <th>Shift Number</th>
                <th>Employee</th>
                <th>Shift Start</th>
                <th>Break Start</th>
                <th>Break End</th>
                <th>Shift End</th>
                <th>Shift Length</th>
                <th>Open</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($shifts as $shift)
                <tr>
                    <td><a href="/shifts/{{$shift->id}}/edit">{{$shift->id}}</a></td>
                    <td>{{$shift->employee->last_name}}</td>
                    <td>{{$shift->showTime('shift_start')}}</td>
                    <td>{{empty($shift->break_start) ? "No Break Start" : $shift->showTime('break_start')}}</td>
                    <td>{{empty($shift->break_end) ? "No Break End" : $shift->showTime('break_end')}}</td>
                    <td>{{empty($shift->shift_end) ? "No Shift End" : $shift->showTime('shift_end')}}</td>
                    <td>{{$shift->open==true ? "Shift Still Open" : $shift->getShiftLength()}}</td>
                    <td><span style="color:{{$shift->open==true ? "orange" : "green"}}">{{$shift->open==true ? "Yes" : "No"}}</span></td>
                    <td><i style="color:#9db2e0" class="fa fa-trash fa-lg" data-id="{{$shift->id}}" data-shift-time="{{$shift->created_at}}" data-employee-name="{{$shift->employee->first_name." ".$shift->employee->last_name}}"></i></td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
@section('custom-js')
    <script>
        $(document).ready(function() {
            $("#shifts").DataTable();
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
                var employeeName = $(this).data('employee-name');
                var shiftTime = $(this).data('shift-time');

                Swal.fire({
                    title: "Are you sure you want to delete "+employeeName+"\'s shift from "+shiftTime+"?",
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: '/shifts/'+id,
                            method: 'DELETE',
                            data: {
                                "_token" : "{{csrf_token()}}",
                                "origin" : "manager"
                            }
                        });

                        Swal.fire(
                            'Deleted!',
                            'Shift has been deleted.',
                            'success'
                        )
                        location.reload();
                    }
                })

            });
        });
    </script>
@endsection