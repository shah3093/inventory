<form enctype="multipart/form-data" id="frmAdd" method="post" action="<?php echo $config::BASEURL . "controller/receivingController.php"; ?>">

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title">Receiving
                    </h4>
                </div>
                <div class="card-body ">
                    <ul class="nav nav-pills nav-pills-warning" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" data-toggle="tab" href="#link1" role="tablist">
                                Receiving
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#link2" role="tablist">
                                Product
                            </a>
                        </li>

                    </ul>
                    <div class="tab-content tab-space">
                        <div class="tab-pane active show" id="link1">
                            <div class="card ">
                                <div class="card-header card-header-rose card-header-icon">
                                    <h4 class="card-title">Supplier information</h4>
                                </div>
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group bmd-form-group">
                                                <label for="suppliername" class="bmd-label-floating">Supplier name *</label>
                                                <input type="text" name="formdata[suppliername]"  class="required form-control " id="suppliername">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group bmd-form-group">
                                                <label for="address" class="bmd-label-floating">Address</label>
                                                <input type="text" name="formdata[address]"  class="form-control " id="address">
                                            </div>
                                        </div>
                                    </div>


                                    <input type="hidden" name="typeofform" value="addForm"/>


                                    <div class="fileinput text-center fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="max-width: 150px !important;">
                                            <img src="../assets/img/image_placeholder.jpg" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                                        <div>
                                            <span class="btn btn-rose btn-round btn-file">
                                                <span class="fileinput-new">Select recept image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="hidden" value="" >
                                                <input type="file" name="productimg">
                                                <div class="ripple-container"></div></span>
                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove<div class="ripple-container"><div class="ripple-decorator ripple-on ripple-out" style="left: 88.4px; top: 36.7px; background-color: rgb(255, 255, 255); transform: scale(15.5063);"></div><div class="ripple-decorator ripple-on ripple-out" style="left: 88.4px; top: 36.7px; background-color: rgb(255, 255, 255); transform: scale(15.5063);"></div></div></a>
                                        </div>
                                    </div>

                                    <br/><br/>
                                    <div class="form-group bmd-form-group">
                                        <label for="address" class="bmd-label-floating">Note</label>
                                        <textarea name="formdata[note]"  class="form-control" id="description"></textarea>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="link2">
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
                        </div>

                    </div>
                </div>
                <div class="card-footer ">
                    <a href="<?php echo $config::BASEURL . "menus/receiving.php"; ?>" class="btn btn-fill  btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-fill btn-success float-right">Save</button>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>

</form>