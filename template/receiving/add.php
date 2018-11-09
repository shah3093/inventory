<form enctype="multipart/form-data" id="frmAdd" method="post" action="<?php echo $config::BASEURL . "controller/receivingController.php"; ?>">

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">


            <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                    <h4 class="card-title">Supplier information</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group bmd-form-group">
                                <label for="suppliername" class="bmd-label-floating">Supplier</label>
                                <select name="formdata[category_id]" class="selectpicker form-control" data-size="2" data-style="btn btn-primary"  tabindex="-98">
                                    <option disabled="" selected="">Select supplier</option>
                                    <option value="">Create new</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                    <h4 class="card-title">Products information</h4>
                </div>
                <div class="card-body ">

                    <?php for ($i = 0; $i < 5; $i++): ?>
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
                                    <input type="text" name="product[<?php echo $i; ?>][purchase_price]"  class="form-control " id="address">
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
                    <?php endfor; ?>

                    <div id="products-field">
                    </div>


                    <br/><br/>

                    <button id="add-product-field" data-count="10" class="btn btn-info">
                        <span class="btn-label">
                            <i class="material-icons">add</i>
                        </span>
                        Add product
                        <div class="ripple-container"></div></button>

                </div>

            </div>

            <div class="card-footer ">
                <a href="<?php echo $config::BASEURL . "menus/receiving.php"; ?>" class="btn btn-fill  btn-danger">Cancel</a>
                <button type="submit" class="btn btn-fill btn-success float-right">Save</button>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>

</form>