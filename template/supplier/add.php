<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <form enctype="multipart/form-data" method="post" action="<?php echo $config::BASEURL . "controller/supplierController.php"; ?>">
            <div class="card ">
                <div class="card-header card-header-rose card-header-icon">

                    <h4 class="card-title">Supplier</h4>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group bmd-form-group">
                                <label for="category" class="bmd-label-floating">Shop name *</label>
                                <input type="text" name="formdata[shop_name]" required class="required form-control" id="category">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group bmd-form-group">
                                <label for="category" class="bmd-label-floating">Provider</label>
                                <input type="text" name="formdata[provider]"  class=" form-control" id="category">
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="typeofform" value="addForm"/>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group bmd-form-group">
                                <label for="category" class="bmd-label-floating">Email </label>
                                <input type="text" name="formdata[email]"  class="form-control" id="category">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group bmd-form-group">
                                <label for="category" class="bmd-label-floating">Phone</label>
                                <input type="text" name="formdata[phone]"  class="form-control" id="category">
                            </div>
                        </div>
                    </div>

                    <div class="form-group bmd-form-group">
                        <label for="category" class="bmd-label-floating">Bank account details</label>
                        <input type="text" name="formdata[bank_account_details]"  class="form-control" id="category">
                    </div>


                    <div class="row">
                        <div class="col-6">
                            <div class="form-group bmd-form-group">
                                <label for="category" class="bmd-label-floating">Address</label>
                                <input type="text" name="formdata[address]"  class="form-control" id="category">
                            </div>
                        </div>
                        <div class="col-6">

                        </div>
                    </div>

                    <div class="form-group bmd-form-group">
                        <label for="category" class="bmd-label-floating">Note</label>
                        <textarea name="formdata[note]"  class="form-control"></textarea>
                    </div>


                    <br/><br/>

                    <div class="fileinput text-center fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="max-width: 150px !important;">
                            <img src="../assets/img/image_placeholder.jpg" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                        <div>
                            <span class="btn btn-rose btn-round btn-file">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="hidden" value="" >
                                <input type="file" name="cusimage">
                                <div class="ripple-container"></div></span>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove<div class="ripple-container"><div class="ripple-decorator ripple-on ripple-out" style="left: 88.4px; top: 36.7px; background-color: rgb(255, 255, 255); transform: scale(15.5063);"></div><div class="ripple-decorator ripple-on ripple-out" style="left: 88.4px; top: 36.7px; background-color: rgb(255, 255, 255); transform: scale(15.5063);"></div></div></a>
                        </div>
                    </div>

                    <div class="category form-category">* Required fields</div>
                </div>
                <div class="card-footer ">
                    <a href="<?php echo $config::BASEURL . "menus/customer.php"; ?>" class="btn btn-fill  btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-fill btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>