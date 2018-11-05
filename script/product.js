$(document).ready(function () {
//Puchase information calculation

    var purchase_price = getValueFromInput("#prchaseprice");
    var purchase_vat = getValueFromInput("#prchasevat");
    var purchase_vat_persent = getValueFromInput("#prchasevat");
    var purchase_others = getValueFromInput("#prchaseother");
    var total_purchaseprice = getValueFromInput("#prchasetotalprice");
    var stock = getValueFromInput("#stock");
    var singleproductpurchaseprice = getValueFromInput("#singleproductprchaseprice");

    $("#prchaseprice").on("blur", function () {
        var data = $("#prchaseprice").val();
        purchase_price = Number(0);
        purchaseTotalPrice();
        if ($.isNumeric(data)) {
            purchase_price = Number(data);
            $("#prchaseprice").parent().removeClass("has-danger");
            purchaseTotalPrice();
        } else {
            $("#prchaseprice").val(null);
            $("#prchaseprice").parent().addClass("has-danger");
            swal('Purchase price is not a valid number');
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

    $("#prchaseother").on("blur", function () {
        var data = $("#prchaseother").val();
        purchase_others = Number(0);
        purchaseTotalPrice();
        if (data.length > 0) {
            if ($.isNumeric(data)) {
                purchase_others = Number(data);
                purchaseTotalPrice();
                $("#prchaseother").parent().removeClass("has-danger");
            } else {
                $("#prchaseother").val(null);
                $("#prchaseother").parent().addClass("has-danger");
                swal('Purchase other price is not a valid number');
            }
        }
    });

    $("#prchasetotalprice").on("blur", function () {
        var data = $("#prchasetotalprice").val();
        if ($.isNumeric(data)) {
            $("#prchasetotalprice").parent().removeClass("has-danger");
        } else {
            $("#prchasetotalprice").val(null);
            $("#prchasetotalprice").parent().addClass("has-danger");
            swal('Purchase total price is not a valid number');
        }
    });

    function purchaseTotalPrice() {
        if (purchase_vat_persent == 0) {
            var tmpdata = purchase_price + purchase_vat + purchase_others;
            total_purchaseprice = Number(tmpdata);
            if (stock > 0) {
                singleproductinfocal();
            }
            $("#prchasetotalprice").val(tmpdata);
        } else {
            var tmpdata = purchase_price + (purchase_price * purchase_vat_persent) + purchase_others;
            total_purchaseprice = Number(tmpdata);
            if (stock > 0) {
                singleproductinfocal();
            }
            $("#prchasetotalprice").val(tmpdata);
        }
    }

    $("#stock").on("blur", function () {
        var data = $("#stock").val();
        stock = 0;
        singleproductpurchaseprice = 0;
        if ($.isNumeric(data)) {
            stock = data;
            $("#stock").parent().removeClass("has-danger");
            singleproductinfocal();
        } else {
            $("#stock").val(null);
            $("#stock").parent().addClass("has-danger");
            swal('Stock is not a valid number');
        }
    });

    function  singleproductinfocal() {
        singleproductpurchaseprice = parseFloat(total_purchaseprice / stock).toFixed(2);
        $("#singleproductprchaseprice").val(singleproductpurchaseprice);
    }

//Puchase information calculation


//Wholesale information calculation

    var wholesaleprice = getValueFromInput("#wholesaleprice");
    var wholesalepercentageofprofit = getValueFromInput("#wholesalepercentageofprofit");
    var wholesalevat = getValueFromInput("#wholesalevat");
    var wholesalevat_percentage = getValueFromInput("#wholesalevat");
    var wholesaleothers = getValueFromInput("#wholesaleothers");
    var wholesaletotal = getValueFromInput("#wholesaletotal");

    $("#wholesaleprice").on("blur", function () {
        var singleproductprchaseprice = Number($("#singleproductprchaseprice").val());
        if ($.isNumeric(singleproductprchaseprice)) {
            var data = $("#wholesaleprice").val();
            wholesaleprice = 0;
            if ($.isNumeric(data)) {
                wholesaleprice = Number(data);

                ///Persenatage calculation
                $("#wholesalepercentageofprofit").val("");
                var tmpdata = parseFloat(((wholesaleprice / singleproductprchaseprice) * 100) - 100).toFixed(2);
                $("#wholesalepercentageofprofit").val(tmpdata);
                ///Persenatage calculation


                $("#wholesaleprice").parent().removeClass("has-danger");
                wholesaleproductinfocal();
            } else {
                $("#wholesaleprice").val(null);
                $("#wholesaleprice").parent().addClass("has-danger");
                swal('wholesale price is not a valid number');
            }
        } else {
            swal('Purchase information is missing');
        }
    });


    $("#wholesalevat").on("blur", function () {
        var data = $("#wholesalevat").val();

        wholesalevat = Number(0);
        wholesalevat_percentage = Number(0);
        wholesaleproductinfocal()

        if (data.length > 0) {

            if (data.search("%") != -1) {
                data = data.replace("%", "");
                if ($.isNumeric(data)) {
                    wholesalevat_percentage = Number(data / 100);
                    wholesaleproductinfocal();
                    $("#wholesalevat").parent().removeClass("has-danger");
                } else {
                    $("#wholesalevat").val(null);
                    $("#wholesalevat").parent().addClass("has-danger");
                    swal('Wholesale vat is not a valid number');
                }
            } else {
                if ($.isNumeric(data)) {
                    wholesalevat = Number(data);
                    wholesaleproductinfocal();
                    $("#wholesalevat").parent().removeClass("has-danger");
                } else {
                    $("#wholesalevat").val(null);
                    $("#wholesalevat").parent().addClass("has-danger");
                    swal('Wholesale vat is not a valid number');
                }
            }
        }
    });

    $("#wholesaleothers").on("blur", function () {
        var data = $("#wholesaleothers").val();
        wholesaleothers = 0;
        wholesaleproductinfocal();
        if (data.length > 0) {
            if ($.isNumeric(data)) {
                wholesaleothers = Number(data);
                $("#wholesaleothers").parent().removeClass("has-danger");
                wholesaleproductinfocal();
            } else {
                $("#wholesaleothers").val(null);
                $("#wholesaleothers").parent().addClass("has-danger");
                swal('wholesale price is not a valid number');
            }
        }
    });

    $("#wholesaletotal").on("blur", function () {
        var data = $("#wholesaletotal").val();
        if ($.isNumeric(data)) {
            $("#wholesaletotal").parent().removeClass("has-danger");
        } else {
            $("#wholesaletotal").val(null);
            $("#wholesaletotal").parent().addClass("has-danger");
            swal('Wholesale total price is not a valid number');
        }
    });


    $("#wholesalepercentageofprofit").on("blur", function () {
        var singleproductprchaseprice = $("#singleproductprchaseprice").val();
        var wholesalepercentageofprofit = $("#wholesalepercentageofprofit").val();

        if ($.isNumeric(singleproductprchaseprice)) {
            if ($.isNumeric(wholesalepercentageofprofit)) {
                var wholesalepercentageofprofit = Number(wholesalepercentageofprofit);
                var singleproductprchaseprice = Number(singleproductprchaseprice);
                var tmpdata = singleproductprchaseprice + (singleproductprchaseprice * wholesalepercentageofprofit / 100);
                wholesaleprice = Number(tmpdata);
                $("#wholesaleprice").val(wholesaleprice);
                wholesaleproductinfocal();
            } else {
                swal('Persentage profit is not a valid number');
            }

        } else {
            swal('Purchase information is missing');
        }
    });


    function wholesaleproductinfocal() {
        if (wholesalevat_percentage == 0) {
            var tmpdata = wholesaleprice + wholesalevat + wholesaleothers;
        } else {
            var tmpdata = wholesaleprice + (wholesaleprice * wholesalevat_percentage) + wholesaleothers;
        }
        wholesaletotal = Number(tmpdata);
        $("#wholesaletotal").val(wholesaletotal);
    }

//Wholesale information calculation


//Retailesale information calculation



    var retailsaleprice = getValueFromInput("#retailsaleprice");
    var retialsalepercentageofprofit = getValueFromInput("#retialsalepercentageofprofit");
    var retailsalevat = getValueFromInput("#retailsalevat");
    var retailsalevat_percentage = getValueFromInput("#retailsalevat_percentage");
    var retailsaleothers = getValueFromInput("#retailsaleothers");
    var retailsaletotal = getValueFromInput("#retailsaletotal");

    $("#retailsaleprice").on("blur", function () {
        var singleproductprchaseprice = Number($("#singleproductprchaseprice").val());
        if ($.isNumeric(singleproductprchaseprice)) {
            var data = $("#retailsaleprice").val();
            retailsaleprice = 0;
            if ($.isNumeric(data)) {
                retailsaleprice = Number(data);

                ///Persenatage calculation
                $("#retialsalepercentageofprofit").val("");
                var tmpdata = parseFloat(((retailsaleprice / singleproductprchaseprice) * 100) - 100).toFixed(2);
                $("#retialsalepercentageofprofit").val(tmpdata);
                ///Persenatage calculation


                $("#retailsaleprice").parent().removeClass("has-danger");
                retailsaleproductinfocal();
            } else {
                $("#retailsaleprice").val(null);
                $("#retailsaleprice").parent().addClass("has-danger");
                swal('Retail sale price is not a valid number');
            }
        } else {
            swal('Purchase information is missing');
        }
    });


    $("#retailsalevat").on("blur", function () {
        var data = $("#retailsalevat").val();

        retailsalevat = Number(0);
        retailsalevat_percentage = Number(0);
        retailsaleproductinfocal()

        if (data.length > 0) {

            if (data.search("%") != -1) {
                data = data.replace("%", "");
                if ($.isNumeric(data)) {
                    retailsalevat_percentage = Number(data / 100);
                    retailsaleproductinfocal();
                    $("#retailsalevat").parent().removeClass("has-danger");
                } else {
                    $("#retailsalevat").val(null);
                    $("#retailsalevat").parent().addClass("has-danger");
                    swal('Retailesale vat is not a valid number');
                }
            } else {
                if ($.isNumeric(data)) {
                    retailsalevat = Number(data);
                    retailsaleproductinfocal();
                    $("#retailsalevat").parent().removeClass("has-danger");
                } else {
                    $("#retailsalevat").val(null);
                    $("#retailsalevat").parent().addClass("has-danger");
                    swal('Retailesale vat is not a valid number');
                }
            }
        }
    });

    $("#retailsaleothers").on("blur", function () {
        var data = $("#retailsaleothers").val();
        retailsaleothers = 0;
        retailsaleproductinfocal();
        if (data.length > 0) {
            if ($.isNumeric(data)) {
                retailsaleothers = Number(data);
                $("#retailsaleothers").parent().removeClass("has-danger");
                retailsaleproductinfocal();
            } else {
                $("#retailsaleothers").val(null);
                $("#retailsaleothers").parent().addClass("has-danger");
                swal('Retailesale other price is not a valid number');
            }
        }
    });

    $("#retailsaletotal").on("blur", function () {
        var data = $("#retailsaletotal").val();
        if ($.isNumeric(data)) {
            $("#retailsaletotal").parent().removeClass("has-danger");
        } else {
            $("#retailsaletotal").val(null);
            $("#retailsaletotal").parent().addClass("has-danger");
            swal('Retailsale total price is not a valid number');
        }
    });


    $("#retialsalepercentageofprofit").on("blur", function () {
        var singleproductprchaseprice = $("#singleproductprchaseprice").val();
        var retialsalepercentageofprofit = $("#retialsalepercentageofprofit").val();

        if ($.isNumeric(singleproductprchaseprice)) {
            if ($.isNumeric(wholesalepercentageofprofit)) {
                retialsalepercentageofprofit = Number(retialsalepercentageofprofit);
                singleproductprchaseprice = Number(singleproductprchaseprice);
                var tmpdata = singleproductprchaseprice + (singleproductprchaseprice * retialsalepercentageofprofit / 100);
                retailsaleprice = Number(tmpdata);
                $("#retailsaleprice").val(retailsaleprice);
                retailsaleproductinfocal();
            } else {
                swal('Persentage profit is not a valid number');
            }

        } else {
            swal('Purchase information is missing');
        }
    });


    function retailsaleproductinfocal() {
        if (retailsalevat_percentage == 0) {
            var tmpdata = retailsaleprice + retailsalevat + retailsaleothers;
        } else {
            var tmpdata = retailsaleprice + (retailsaleprice * retailsalevat_percentage) + retailsaleothers;
        }
        retailsaletotal = Number(tmpdata);
        $("#retailsaletotal").val(retailsaletotal);
    }

//Retailesale information calculation


    function getValueFromInput(inputid) {
        var data = $(inputid).val();
        if ($.isNumeric(data)) {
            return Number(data);
        } else {
            return Number(0);
        }
    }

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