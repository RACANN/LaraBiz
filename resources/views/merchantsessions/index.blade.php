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
            <a class="is-primary is-outlined"><span class="icon is-small is-left">
        <i class="fa fa-check"></i>
      </span></a>
            <a class="is-primary is-outlined"><span class="icon is-small is-left">
        <i class="fa fa-sort"></i>
      </span></a>
            <a class="is-primary is-outlined" href="/merchantsession/new"><span class="icon is-small is-left">
        <i class="fa fa-plus"></i>
      </span></a>
            <a class="is-primary is-outlined"><span class="icon is-small is-left">
        <i class="fa fa-dollar"></i>
      </span></a>
        </p>
        @foreach($merchantsessions as $merchantsession)

            @include('merchantsession.merchantsession')

        @endforeach
    </nav>
@endsection