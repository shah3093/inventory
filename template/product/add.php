<form enctype="multipart/form-data" id="frmAdd" method="post" action="<?php echo $config::BASEURL . "controller/productController.php"; ?>">

    <div id="errorDiv" class="alert alert-danger text-center d-none" role="alert">
        error
    </div>

    <div class="category form-category">* Required fields</div>
    <div class="row">
        <div class="col-6">
            <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                    <h4 class="card-title">Product information</h4>
                </div>
                <div class="card-body ">
                    <select name="formdata[category_id]" class="selectpicker form-control" data-size="<?php echo count($categories) + 2; ?>" data-style="btn btn-primary"  tabindex="-98">
                        <option disabled="" selected="">Select category</option>
                        <option value="">None</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <br/><br/>
                    <div class="form-group bmd-form-group">
                        <label for="pname" class="bmd-label-floating">Name *</label>
                        <input type="text" name="formdata[name]" required class="form-control required" id="pname">
                    </div>

                    <input type="hidden" name="typeofform" value="addForm"/>


                    <div class="fileinput text-center fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="max-width: 150px !important;">
                            <img src="../assets/img/image_placeholder.jpg" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                        <div>
                            <span class="btn btn-rose btn-round btn-file">
                                <span class="fileinput-new">Select product image</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="hidden" value="" >
                                <input type="file" name="productimg">
                                <div class="ripple-container"></div></span>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove<div class="ripple-container"><div class="ripple-decorator ripple-on ripple-out" style="left: 88.4px; top: 36.7px; background-color: rgb(255, 255, 255); transform: scale(15.5063);"></div><div class="ripple-decorator ripple-on ripple-out" style="left: 88.4px; top: 36.7px; background-color: rgb(255, 255, 255); transform: scale(15.5063);"></div></div></a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="col-6">
            <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                    <h4 class="card-title">Purchase information</h4>
                </div>
                <div class="card-body ">
                    <div id="purchaseinfo" class="alert alert-danger text-center d-none" role="alert">
                        error
                    </div>
                    <div class="form-group bmd-form-group">
                        <label for="prchaseprice" class="bmd-label-floating"> Price *</label>
                        <input type="text" name="formdata[purchase_price]" required class="form-control required" id="prchaseprice">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label for="prchasevat" class="bmd-label-floating"> vat </label>
                                <input type="text" name="formdata[purchase_vat]"  class="form-control" id="prchasevat">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label for="prchaseother" class="bmd-label-floating">Others</label>
                                <input type="text" name="formdata[purchase_others]"  class="form-control" id="prchaseother">
                            </div>
                        </div>
                    </div>
                    <div class="form-group bmd-form-group">
                        <label for="prchasetotalprice" class="bmd-label-floating">Total price *</label>
                        <input type="text" name="formdata[total_purchaseprice]" required class="form-control required" id="prchasetotalprice">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label for="stock" class="bmd-label-floating"> Stock *</label>
                                <input type="text" name="formdata[stock]" required class="form-control required" id="stock">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label for="measurementunit" class="bmd-label-floating">Measurement unit</label>
                                <input type="text" name="formdata[measurementunit]"  class="form-control" id="measurementunit">
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="form-group bmd-form-group">
                        <label for="singleproductprchaseprice" class="bmd-label-floating">Single product purchase price</label>
                        <input type="text" readonly  required class="form-control" id="singleproductprchaseprice">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                    <h4 class="card-title">Wholesale information</h4>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label for="wholesaleprice" class="bmd-label-floating"> Price </label>
                                <input type="text" name="formdata[wholesaleprice]"  class="form-control" id="wholesaleprice">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label for="wholesalepercentageofprofit" class="bmd-label-floating">Profit percentage </label>
                                <input type="text" name="formdata[wholesalepercentageofprofit]"  class="form-control" id="wholesalepercentageofprofit">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label for="wholesalevat" class="bmd-label-floating"> Vat </label>
                                <input type="text" name="formdata[wholesalevat]"  class="form-control" id="wholesalevat">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label for="wholesaleothers" class="bmd-label-floating">Others</label>
                                <input type="text" name="formdata[wholesaleothers]"  class="form-control" id="wholesaleothers">
                            </div>
                        </div>
                    </div>
                    <div class="form-group bmd-form-group">
                        <label for="wholesaletotal" class="bmd-label-floating">Total price</label>
                        <input type="text" name="formdata[wholesaletotal]"  class="form-control" id="wholesaletotal">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                    <h4 class="card-title">Retail sale information</h4>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label for="retailsaleprice" class="bmd-label-floating"> Price </label>
                                <input type="text" name="formdata[retailsaleprice]"  class="form-control" id="retailsaleprice">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label for="retialsalepercentageofprofit" class="bmd-label-floating">Profit percentage </label>
                                <input type="text" name="formdata[retialsalepercentageofprofit]"  class="form-control" id="retialsalepercentageofprofit">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label for="retailsalevat" class="bmd-label-floating"> Vat </label>
                                <input type="text" name="formdata[retailsalevat]"  class="form-control" id="retailsalevat">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label for="retailsaleothers" class="bmd-label-floating">Others</label>
                                <input type="text" name="formdata[retailsaleothers]"  class="form-control" id="retailsaleothers">
                            </div>
                        </div>
                    </div>
                    <div class="form-group bmd-form-group">
                        <label for="retailsaletotal" class="bmd-label-floating">Total price</label>
                        <input type="text" name="formdata[retailsaletotal]"  class="form-control" id="retailsaletotal">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                    <h4 class="card-title">Note</h4>
                </div>
                <div class="card-body ">
                    <div class="form-group bmd-form-group">
                        <textarea name="formdata[note]"  class="form-control" id="description"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer ">
        <a href="<?php echo $config::BASEURL . "menus/product.php"; ?>" class="btn btn-fill  btn-danger">Cancel</a>
        <button type="submit" id="submit" class="btn btn-fill btn-success float-right">Save</button>
    </div>
</form>