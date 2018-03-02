<div class="card">
  <div class="card-content">
    <div class="media">
      <div class="media-left">
        <figure class="image is-48x48">
          <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
        </figure>
      </div>
      <div class="media-content">
        <p class="title is-4">{{$employee->first_name}} {{$employee->last_name}}</p>
        <p class="subtitle is-6">{{$employee->email}}</p>
      </div>
    </div>

    <div class="content">
      
        <p>First Name: {{$employee->first_name}}</p>
        <p>Last Name: {{$employee->last_name}}</p>
        <p>Phone: {{$employee->phone}}</p>
        <p>Birth Date: {{$employee->birth_date}}</p>
        <p>Hire Date: {{$employee->hire_date}}</p>
        <p>Pay: {{$employee->pay}}</p>
        <span class="icon is-small is-left">
            <form>
            <button class="is-link"><a href="/employees/{{$employee->id }}/edit"><i class="fa fa-edit"></i></a></button>
            </form>
      </span>
        <span class="icon is-small is-left">
            <form action="{{ url('employees/'.$employee->id) }}" method="POST">
            {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="is-link" type="submit"><i class="fa fa-trash"></i></button>
        </form>

      </span>
    </div>
  </div>
</div>