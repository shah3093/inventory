$(document).ready(function () {

    $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        "order": [],
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

});