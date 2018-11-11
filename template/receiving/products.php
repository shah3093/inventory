<?php
$i = $_POST['count'];
    ?>
    <div class="row">
        <div class="col-5">
            <div class="form-group bmd-form-group">
                <label for="suppliername" class="bmd-label-floating">Product name </label>
                <input type="text" name="product[<?php echo $i; ?>][name]"  class="form-control " id="suppliername">
            </div>
        </div>
        <div class="col-2">
            <div class="form-group bmd-form-group">
                <label for="address" class="bmd-label-floating">Purchase price</label>
                <input type="text" name="product[<?php echo $i; ?>][purchase_price]"  class="purchaseprice form-control " id="address">
            </div>
        </div>
        <div class="col-2">
            <div class="form-group bmd-form-group">
                <label for="address" class="bmd-label-floating">Stock</label>
                <input type="text" name="product[<?php echo $i; ?>][stock]"  class="form-control " id="address">
            </div>
        </div>
        <div class="col-2">
            <div class="form-group bmd-form-group">
                <label for="address" class="bmd-label-floating">Unit</label>
                <input type="text" name="product[<?php echo $i; ?>][measurementunit]"  class="form-control " id="address">
            </div>
        </div>
    </div>
