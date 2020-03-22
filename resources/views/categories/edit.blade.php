@extends('layouts.master')
@section('content')

    <form method="POST" action="/categories/{{$category->id}}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input class="input" type="text" name="name" maxlength="20" value="{{$category->name}}" required>
            </div>
        </div>
        <div class="control">
            <label class="radio">
                <input type="radio" name="taxable"  value=1 checked>
                Yes
            </label>
            <label class="radio">
                <input type="radio" name="taxable" value=0>
                No
            </label>
        </div>
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link" type="submit">Edit Category Info</button>
            </div>
            <div class="control">
                <a href="/categories" class="button is-link">Cancel</a>
            </div>
        </div>
    </form>
@endsection

