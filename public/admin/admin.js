
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    $(".destroy").click(function () {
        let id = $(this).data('id');
        let action = $(this).data('action');
        let button = $(this);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax(
                    {
                        type: "DELETE",
                        url: action,
                        dataType: 'json',
                        data: { id: id },
                        success: function (response)
                        {
                            button.parent().parent().remove();
                            if (response.status == "Success"){
                                Swal.fire( 'Deleted!', 'Record Successfully Deleted.', 'success');
                            }
                        },
                    }
                );
            }
        })
    });
});

