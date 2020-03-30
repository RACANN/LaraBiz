@extends('layouts.master')
@section('content')
    @include('payroll.modals.add_payroll_modal')
    <h1 class="title">@section('title', 'Payroll')</h1>
    <div class="navbar-menu">
        <div class="navbar-end">
            <div class="button is-success is-outlined is-rounded" id="btn_add_new">Run New Payroll</div>
        </div>
    </div>

    <hr>

    <div id="orders">
        @foreach($payrolls as $payroll)
            <h1>Payroll #: {{$payroll->id}} | Date: {{$payroll->created_at}} | Employee: {{$payroll->employee->getFullName()}}</h1>
            <div>
                <ul>
                    @foreach($payroll->payrollEntries as $pe)
                       <li>Shift#: {{$pe->shift->id}}</li>
                       <li>Shift Length: {{$pe->shift->getShiftLength()}}</li>
                       <li>Shift Cost: {{$pe->shift->cost()}}</li>
                    @endforeach
                </ul>
                <br>
                <p>Payment Amount: ${{$payroll->total_paid}} | Total Hours: {{$payroll->total_hours}} | Overtime Hours: {{$payroll->ot_hours}} | Overtime Pay: {{$payroll->ot_paid}}</p>
                <hr>
                <i style="color:#9db2e0" class="fa fa-trash fa-lg" data-id="{{$payroll->id}}"></i>
            </div>
        @endforeach
    </div>

@section('custom-js')
    <script>
        $(document).ready(function() {

            $("#orders").accordion();

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


                Swal.fire({
                    title: "Are you sure you want to delete payroll data #:"+ id + "?",
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {

                        Swal.fire('Sorry I don\'t think that\'s a good idea right now.');

                        {{--$.ajax({--}}
                            {{--url: '/payrolls/'+id,--}}
                            {{--method: 'DELETE',--}}
                            {{--data: {--}}
                                {{--"_token" : "{{csrf_token()}}",--}}
                            {{--}--}}
                        {{--});--}}

//                        Swal.fire(
//                            'Deleted!',
//                            'Payroll Data has been deleted.',
//                            'success'
//                        )
                        location.reload();
                    }
                })



            });
        });
    </script>
@endsection

@endsection