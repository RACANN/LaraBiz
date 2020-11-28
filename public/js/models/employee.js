function Employee(){

    this.registerModal = function(modal_target, open_target, close_target){
        $(open_target).on("click", function(){
            $(modal_target).addClass('is-active').fadeIn();
        });
        $(close_target).on("click", function(){
            $(modal_target).removeClass('is-active')
        });
    }
    this.registerDelete = function(ui_target, token){
        $(ui_target).on('click', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var firstName = $(this).data('first-name');
            var lastName= $(this).data('last-name');
            Swal.fire({
                title: "Are you sure you want to delete "+firstName + " " + lastName + "?",
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: '/employees/'+id,
                        method: 'POST',
                        data: {
                            "_token" : token
                        }
                    });
                    Swal.fire(
                        'Deleted!',
                        'Employee has been deleted.',
                        'success'
                    )
                    //location.reload();
                }
            })
        });
    }
}

