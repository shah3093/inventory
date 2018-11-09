$(document).ready(function () {


    $('#datatables thead #parent').html('<input id="parentSearch" type="text" placeholder="Parent" />');

    // Apply the search
    $('#datatables thead #parent').on('keyup', function () {
        var searchval = $("#parentSearch").val();
        table
                .columns(2)
                .search(searchval)
                .draw();
    });

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
