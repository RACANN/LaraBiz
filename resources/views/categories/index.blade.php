@extends('layouts.master')
@section('content')
    @include('categories.modals.add_category_modal')
    <h1 class="title">@section('title', 'Categories')</h1>
    <div class="navbar-menu">
        <div class="navbar-end">
            <div class="button is-info is-outlined is-rounded" id="btn_add_new">Add New Category</div>
        </div>
    </div>

    <hr>

    <table id="products" class="display">
        <thead>
        <tr>
            <th>Name</th>
            <th>Taxable</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td><a href="/categories/{{$category->id}}/edit">{{$category->name}}</a></td>
                <td>{{$category->taxable == true ? "Yes" : "No"}}</td>
                <td><i style="color:#9db2e0" class="fa fa-trash fa-lg" data-id="{{$category->id}}" data-category-name="{{$category->name}}"></i></td>
            </tr>

        @endforeach
        </tbody>
    </table>

@section('custom-js')
    <script>
        //getData();
        $(document).ready(function() {

            $('#products').DataTable({
                "columnDefs": [
                    { "orderable": false, "targets": 2 }
                ]
            });

            $('#btn_add_new').on("click", function(){
                $('#add_new_modal').addClass('is-active').fadeIn();
            });
            $('#btn_cancel_add_new').on("click", function(){
                $('#add_new_modal').removeClass('is-active')
            });
            $('#close_add_new').on("click", function(){
                $('#add_new_modal').removeClass('is-active')
            });

            $(".fa-trash").on("click", function(){
                var id = $(this).data('id');
                var catName = $(this).data('category-name');

                Swal.fire({
                    title: "Are you sure you want to delete category  "+ catName + "?",
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: '/categories/'+id,
                            method: 'DELETE',
                            data: {
                                "_token" : "{{csrf_token()}}"
                            }
                        });

                        Swal.fire(
                            'Deleted!',
                            'Category has been deleted.',
                            'success'
                        )
                        location.reload();
                    }
                })
            })

        });
    </script>
@endsection

@endsection
