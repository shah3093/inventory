$(document).ready(function () {

    table = $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        "order": [],
        "columnDefs": [
            {"orderable": false, "targets": targets}
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        }
    });

    $("body").on("click", "#submitform", function (e) {
        e.preventDefault();
        var check = 0;
        $(".required").each(function () {
            if (!$(this).val()) {
                $(this).parent().addClass("has-danger");
                check = 1;
            } else {
                $(this).parent().removeClass("has-danger");
            }
        });
        if (check == 0) {
            var data = new FormData(document.getElementById("frmAdd"));
            var url = $("#frmAdd").attr('action');
            datainsertdb(data, url);
        }
    });

    function datainsertdb(data, url) {
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            async: false,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            success: function (resp) {
                if (resp.trim() == 'DONE') {
                    $("#errorDiv").html(resp);
                    $("#errorDiv").removeClass("d-none");
                } else {
                    window.location = resp;
                }
            }
        });
    }

    $(".deleteasset").on("click", function (e) {
        e.preventDefault();
        var assetid = $(this).attr("data-imageid");
        var divid = $(this).attr("data-divid");

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
                $.post(baseurl + "library/commontasks.php", {id: assetid,type:"deleteasset"}, function (result) {
                    if (result == "DONE") {
                        swal(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                                )
                        $("#" + divid).remove();
                    }

                });

            }
        });
    });

});