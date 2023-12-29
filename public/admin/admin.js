
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
                        success: function (response) {
                            button.parent().parent().remove();
                            if (response.status == "Success") {
                                Swal.fire('Deleted!', 'Record Successfully Deleted.', 'success');
                            }
                        },
                    }
                );
            }
        })
    });
});

$(".status").click(function () {
    let action = $(this).data('action');
    Swal.fire({
        title: 'Durum Seç',
        input: 'select',
        inputOptions: {
            'Active': 'Active',
            'Pending': 'Pending',
            'Passive': 'Passive',
        },
        inputAttributes: {
            autocapitalize: 'off',
        },
        inputPlaceholder: 'Select to Status',
        showCancelButton: true,
        confirmButtonText: 'Look up',
        showLoaderOnConfirm: true,
        preConfirm: (login) => {
            let status = Swal.getPopup().querySelector('.swal2-select').value;
            let dataID = $(this).data('id');
            $.ajax({
                url: action,
                method: 'POST',
                data: {
                    id: dataID,
                    status: status,
                },
                async: false,
                success: function (response) {
                    if (response.status == "Success") {
                        Swal.fire('Updated!', 'Your file has been updated.', 'success');
                        location.reload();
                    }
                },

            })
        },
        allowOutsideClick: () => !Swal.isLoading()
    })
});

