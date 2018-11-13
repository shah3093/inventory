$(document).ready(function () {
    var purchaseprice = getPurchaseprice();
    var purchase_vat = getValueFromInput("#prchasevat");
    var purchase_vat_persent = getValueFromInput("#prchasevat");
    var purchaseothers = getValueFromInput("#purchase-others");
    var total_purchaseprice = Number(0);



    $(".purchaseprice").on("blur", function () {
        var data = $(this).val();
        if (data.length > 0) {
            if ($.isNumeric(data)) {
                getPurchaseprice();
                $(this).parent().removeClass("has-danger");
            } else {
                $(this).val(null);
                $(this).parent().addClass("has-danger");
                swal('Purchase  price is not a valid number');
            }
        }
    });

    $(".stock").on("blur", function () {
        var data = $(this).val();
        if (data.length > 0) {
            if ($.isNumeric(data)) {
                $(this).parent().removeClass("has-danger");
            } else {
                $(this).val(null);
                $(this).parent().addClass("has-danger");
                swal('Stock is not a valid number');
            }
        }
    });

    $("#purchase-others").on("blur", function () {
        var data = $("#purchase-others").val();
        purchaseothers = Number(0);
        purchaseTotalPrice();
        if (data.length > 0) {
            if ($.isNumeric(data)) {
                purchaseothers = Number(data);
                purchaseTotalPrice();
                $("#purchase-others").parent().removeClass("has-danger");
            } else {
                $("#purchase-others").val(null);
                $("#purchase-others").parent().addClass("has-danger");
                swal('Purchase other price is not a valid number');
            }
        }
    });


    $("#prchasevat").on("blur", function () {
        var data = $("#prchasevat").val();

        purchase_vat = Number(0);
        purchase_vat_persent = Number(0);
        purchaseTotalPrice();

        if (data.length > 0) {

            if (data.search("%") != -1) {
                data = data.replace("%", "");
                if ($.isNumeric(data)) {
                    purchase_vat_persent = Number(data / 100);
                    purchaseTotalPrice();
                    $("#prchasevat").parent().removeClass("has-danger");
                } else {
                    $("#prchasevat").val(null);
                    $("#prchasevat").parent().addClass("has-danger");
                    swal('Purchase vat is not a valid number');
                }
            } else {
                if ($.isNumeric(data)) {
                    purchase_vat = Number(data);
                    purchaseTotalPrice();
                    $("#prchasevat").parent().removeClass("has-danger");
                } else {
                    $("#prchasevat").val(null);
                    $("#prchasevat").parent().addClass("has-danger");
                    swal('Purchase vat is not a valid number');
                }
            }
        }
    });




    function getPurchaseprice() {
        purchase_vat = getValueFromInput("#prchasevat");
        purchase_vat_persent = getValueFromInput("#prchasevat");
        purchaseothers = getValueFromInput("#purchase-others");
        purchaseprice = 0;
        $(".purchaseprice").each(function () {
            var tmpval = $(this).val();
            if (tmpval.length > 0) {
                purchaseprice += Number(tmpval);
            } else {
                purchaseprice += Number(0);
            }
        });
        purchaseTotalPrice();
        return purchaseprice;
    }


    function getValueFromInput(inputid) {
        var data = $(inputid).val();
        if ($.isNumeric(data)) {
            return Number(data);
        } else {
            return Number(0);
        }
    }

    function purchaseTotalPrice() {
        if (purchase_vat_persent == 0) {
            var tmpdata = purchaseprice + purchase_vat + purchaseothers;
            total_purchaseprice = Number(tmpdata);
            $("#prchasetotalprice").val(tmpdata);
            return total_purchaseprice;
        } else {
            var tmpdata = purchaseprice + (purchaseprice * purchase_vat_persent) + purchaseothers;
            total_purchaseprice = Number(tmpdata);
            $("#prchasetotalprice").val(tmpdata);
            return total_purchaseprice;
        }
    }

    ///////Payment Calculation
    $(".purchasepay").on("blur", function (e) {
        e.preventDefault();
        console.log("done");
        var dueid = $(this).attr("data-dueid");
        var tmpval = Number($(this).val());
        if ($(this).attr("data-dueprevid")) {
            var dueprevid = $(this).attr("data-dueprevid");
            if ($("#" + dueprevid).val()) {
                var prevdue = Number($("#" + dueprevid).val());
                var cal = prevdue - tmpval;
            } else {
                var totalprice = Number($("#prchasetotalprice").val());
                var cal = totalprice - tmpval;
            }

            $("#" + dueid).val(cal);
        } else {
            var totalprice = Number($("#prchasetotalprice").val());
            var cal = totalprice - tmpval;
            $("#" + dueid).val(cal);
        }

    });

    ///Calculate
    $("#calculateid").on("click", function (e) {
        e.preventDefault();
        var totalprice = purchaseTotalPrice();
        $(".purchasepay").each(function () {
            var dueid = $(this).attr("data-dueid");
            var tmpval = Number($(this).val());
            if ($(this).attr("data-dueprevid")) {
                var dueprevid = $(this).attr("data-dueprevid");
                if ($("#" + dueprevid).val()) {
                    var prevdue = Number($("#" + dueprevid).val());
                    var cal = prevdue - tmpval;
                } else {
                    var totalprice = Number($("#prchasetotalprice").val());
                    var cal = totalprice - tmpval;
                }
                $("#" + dueid).val(cal);
            } else {
                var totalprice = Number($("#prchasetotalprice").val());
                var cal = totalprice - tmpval;
                $("#" + dueid).val(cal);
            }
        });
    });
});