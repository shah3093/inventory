<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <form enctype="multipart/form-data" method="post" action="<?php echo $config::BASEURL . "controller/customerController.php"; ?>">
            <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                    <h4 class="card-title">Customer</h4>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-7">
                            <div class="form-group bmd-form-group">
                                <label for="category" class="bmd-label-floating">Name *</label>
                                <input value="<?php echo $customer['name']; ?>" type="text" name="formdata[name]" required class="required form-control" id="category">
                            </div>
                        </div>
                        <div class="col-5">
                            <select name="formdata[type]" class="selectpicker form-control" data-size="3" data-style="btn btn-primary"  tabindex="-98">
                                <option disabled="" selected="">Select type</option>
                                <option  <?php echo $customer['type'] == "RETAIL" ? "selected" : ""; ?> value="RETAIL">Retail</option>
                                <option <?php echo $customer['type'] == "WHOLESALE" ? "selected" : ""; ?> value="WHOLESALE">Wholesale</option>
                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="typeofform" value="editForm"/>
                    <input type="hidden" name="customerid" value="<?php echo $customer['id']; ?>"/>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group bmd-form-group">
                                <label for="category" class="bmd-label-floating">Email </label>
                                <input value="<?php echo $customer['email']; ?>" type="text" name="formdata[email]"  class="form-control" id="category">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group bmd-form-group">
                                <label for="category" class="bmd-label-floating">Phone</label>
                                <input value="<?php echo $customer['phones']; ?>" type="text" name="formdata[phones]"  class="form-control" id="category">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group bmd-form-group">
                                <label for="category" class="bmd-label-floating">Voter ID </label>
                                <input value="<?php echo $customer['voterid']; ?>" type="text" name="formdata[voterid]"  class="form-control" id="category">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group bmd-form-group">
                                <label for="category" class="bmd-label-floating">Facebook</label>
                                <input value="<?php echo $customer['facebookid']; ?>" type="text" name="formdata[facebookid]"  class="form-control" id="category">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group bmd-form-group">
                        <label for="category" class="bmd-label-floating">Address</label>
                        <input value="<?php echo $customer['address']; ?>" type="text" name="formdata[address]"  class="form-control" id="category">
                    </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group bmd-form-group">
                                <label for="category" class="bmd-label-floating">Note</label>
                                <input value="<?php echo $customer['note']; ?>" type="text" name="formdata[note]"  class="form-control" id="category">
                            </div>
                        </div>
                    </div>


                    <br/><br/>

                    <div class="fileinput text-center fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="max-width: 150px !important;">
                            <?php if ($customer['image'] != NULL): ?>
                                <img src="../assets/uploads/<?php echo $customer['image']; ?>" alt="...">
                            <?php else : ?>
                                <img src="../assets/img/image_placeholder.jpg" alt="...">
                            <?php endif; ?>
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