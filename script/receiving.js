$(document).ready(function () {

    $("#add-product-field").on("click", function (event) {
        event.preventDefault();
        var count = Number($(this).attr("data-count"));
        count += 5;
        $(this).attr("data-count", count);
        $.post(baseurl + "template/receiving/products.php", {count: count}, function (result) {
            $("#products-field").append(result);
        });
    });

    $(".deleteproduct").on("click", function (event) {
        event.preventDefault();
        var productid = $(this).attr("data-id");
        var typeofform = "deletesingleproduct";
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
                $.post(baseurl + "controller/receivingController.php", {productid: productid, typeofform: typeofform}, function (result) {
                    if (result == "DONE") {
                        swal(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                                )
                        $("#row-" + productid).remove();
                    }
                });
            }
        });
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

})