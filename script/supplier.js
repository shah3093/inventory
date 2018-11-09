$(document).ready(function () {

    $(".remove").on("click", function () {
        var url = $(this).attr("data-href");
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result) {
                swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                window.location = url;
            }
        });
    });

});
