<?php
$i = $_POST['count'];
?>
<div class="card">
    <div class="card-header card-header-rose card-header-icon">
        <h4 class="card-title">Payment step <?php echo $i; ?></h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-7">
                <div class="row" style="margin-left: 15px;">
                    <input  type="file"  name="Image"/>
                    <input type="text"  class="form-control" name="" placeholder="Caption"/>
                </div>
                <span id="paymentimages-<?php echo $i; ?>"></span>
                <button data-count="1" data-spanid="paymentimages-<?php echo $i; ?>" class="addpaymentimages btn btn-info btn-sm">
                    <span class="btn-label">
                        <i class="material-icons">add</i>
                    </span>
                    image field
                </button>

                <div class="form-group bmd-form-group">
                    <label for="address" class="bmd-label-floating">Note</label>
                    <textarea class="form-control" name="Payment[<?php echo $i-1; ?>][note]"></textarea>
                       <input type="hidden" name="Payment[<?php echo $i-1; ?>][serial_number]" value="<?php echo $i-1; ?>"/>
                </div>

            </div>
            <div class="col-5">

                <div class="row ">
                    <label class="col-sm-4 col-form-label">Pay</label>
                    <div class="col-sm-8">
                        <input type="text" data-dueprevid="due-<?php echo $i - 2; ?>" data-dueid="due-<?php echo $i - 1; ?>" name="Payment[<?php echo $i-1; ?>][pay]"  class="purchasepay form-control " />
                    </div>
                </div>

                <div class="row ">
                    <label class="col-sm-4 col-form-label">Due</label>
                    <div class="col-sm-8">
                        <input id="due-<?php echo $i - 1; ?>" type="text" name="Payment[<?php echo $i-1; ?>][due]"  class="form-control " />
                    </div>
                </div>

                <div class="row ">
                    <label class="col-sm-4 col-form-label">Payment type</label>
                    <div class="col-sm-8">
                        <select name="Payment[<?php echo $i-1; ?>][payment_type]" class="form-control" >
                            <option value="CASH">Cash</option>
                            <option value="CHEQUE">Cheque</option>
                            <option value="CASH + CHEQUE">Cash + Cheque</option>
                            <option value="OTHERS">Other</option>
                        </select>
                    </div>
                </div>
                <br/>

                <div class="row ">
                    <label class="col-sm-4 col-form-label">Paid date</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control datepicker"  name="Payment[<?php echo $i-1; ?>][pay_date]" placeholder="select date" />
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        ///////Payment Calculation
        $(".purchasepay").on("blur", function (e) {
            e.preventDefault();
            var dueid = $(this).attr("data-dueid");
            var tmpval = Number($(this).val());
            if ($(this).attr("data-dueprevid")) {
                var dueprevid = $(this).attr("data-dueprevid");
                var prevdue = Number($("#" + dueprevid).val());
                var cal = prevdue - tmpval;
                $("#" + dueid).val(cal);
            } else {
                var totalprice = Number($("#prchasetotalprice").val());
                var cal = totalprice - tmpval;
                $("#" + dueid).val(cal);
            }

        });

        // initialise Datetimepicker and Sliders
        md.initFormExtendedDatetimepickers();
        if ($('.slider').length != 0) {
            md.initSliders();
        }

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

    });
</script>