$(document).ready(function () {

    $("#supplierselectid").select2();

    $("#supplierselectid").change(function () {
        if ($(this).val() == "createnew") {
            $.post(baseurl + "template/receiving/supplier.php", {}, function (result) {
                $("#newsupplierdiv").html(result);
                $("#selectrowsupplier").hide();
                $("#deletesupplier").removeClass("d-none");
            });
        }
    });
    
    $("#deletesupplier").on("click",function(e){
        e.preventDefault();
         $("#selectrowsupplier").show();
         $("#deletesupplier").addClass("d-none");
          $("#newsupplierdiv").empty();
    });

    // initialise Datetimepicker and Sliders
    md.initFormExtendedDatetimepickers();
    if ($('.slider').length != 0) {
        md.initSliders();
    }

    $("#add-product-field").on("click", function (event) {
        event.preventDefault();
        var count = Number($(this).attr("data-count"));
        count += 1;
        $(this).attr("data-count", count);
        $.post(baseurl + "template/receiving/products.php", {count: count}, function (result) {
            $("#products-field").append(result);
        });
    });


    $(".addpaymentimages").on("click", function (e) {
        e.preventDefault();
        var count = Number($(this).attr("data-count"));
        var spanid = $(this).attr("data-spanid");
        count += 1;
        $(this).attr("data-count", count);
        $.post(baseurl + "template/receiving/imagefield.php", {count: count}, function (result) {
            $("#" + spanid).append(result);
        });
    });
    
     $("#addpaymentstep").on("click", function (e) {
        e.preventDefault();
        var count = Number($(this).attr("data-count"));
        count += 1;
        $(this).attr("data-count", count);
        $.post(baseurl + "template/receiving/paymentstep.php", {count: count}, function (result) {
            $("#paymentstep").append(result);
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

});