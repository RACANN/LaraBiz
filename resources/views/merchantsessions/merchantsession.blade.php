<div class="card">
    <div class="card-content">
        <div class="media">
            <div class="media-left">
            </div>
            <div class="media-content">
                <p class="title is-4">{{$employee->first_name}} {{$employee->last_name}}</p>
            </div>
        </div>

        <div class="content">

            <p>First Name: {{$employee->first_name}}</p>
            <p>Last Name: {{$employee->last_name}}</p>
            <p>Phone: {{$employee->phone}}</p>
            <p>Birth Date: {{$employee->birth_date}}</p>
            <p>Hire Date: {{$employee->hire_date}}</p>
            <p>Pay: {{$employee->pay}}</p>

            <div class="field is-grouped">
                <div class="control">
                    <a href="/employees/{{$employee->id }}/edit" class="button is-link">Edit</a>
                </div>
                <div class="control">
                    <form id="deleteForm" action="{{ url('employees/'.$employee->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        {{--<a><i class="fa fa-trash" onclick="confirmDelete(document.getElementById('deleteForm'))"></i></a>--}}
                        <button  class="button is-link" onclick="confirmDelete()" class="button is-link">Delete</button>
                    </form>
                </div>
            </div>





        </div>
    </div>
</div>