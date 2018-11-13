<form enctype="multipart/form-data" id="frmAdd" method="post" action="<?php echo $config::BASEURL . "controller/receivingController.php"; ?>">

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">

            <div class="card ">
                <div class="row">
                    <div class="col-6">
                        <div class="card-header card-header-rose card-header-icon">
                            <h4 class="card-title">Supplier information</h4>
                        </div>
                    </div>
                    <div class="col-6">
                        <button id="deletesupplier" class="btn btn-danger btn-round btn-fab float-right d-none">
                            <i class="material-icons">delete</i>
                            <div class="ripple-container"></div>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <span id="newsupplierdiv"></span>
                    <div class="row" id="selectrowsupplier">
                        <div class="col-4">
                            <div class="form-group bmd-form-group">
                                <label for="suppliername" class="bmd-label-floating">Supplier</label>
                                <select id="supplierselectid" name="formdata[supplier_id]" class="form-control required" >
                                    <option disabled="" selected="">Select supplier</option>
                                    <option value="createnew">Create new</option>
                                    <?php foreach ($suppliers as $supplier): ?>
                                        <option value="<?php echo $supplier['id']; ?>"><?php echo $supplier['shop_name']; ?></option>
                                    <?php endforeach; ?>
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
                                    <input type="text" name="product[<?php echo $i; ?>][name]"  class="form-control " />
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group bmd-form-group">
                                    <label for="address" class="bmd-label-floating">Purchase price</label>
                                    <input type="text" name="product[<?php echo $i; ?>][purchase_price]"  class="form-control purchaseprice" />
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group bmd-form-group">
                                    <label for="address" class="bmd-label-floating">Stock</label>
                                    <input type="text" name="product[<?php echo $i; ?>][stock]"  class="form-control stock" >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group bmd-form-group">
                                    <label for="address" class="bmd-label-floating">Unit</label>
                                    <input type="text" name="product[<?php echo $i; ?>][measurementunit]"  class="form-control " />
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

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-7">
                            <div class="col-6">
                                <div class="form-group bmd-form-group">
                                    <input type="text" class="form-control datepicker"  name="formdata[receive_date]" placeholder="select date" />
                                </div>
                            </div>

                            <div class="form-group bmd-form-group">
                                <label for="address" class="bmd-label-floating">Note</label>
                                <textarea class="form-control" name="formdata[note]"></textarea>
                                <input type="hidden" name="typeofform" value="addForm" />
                            </div>

                        </div>
                        <div class="col-5">

                            <div class="row ">
                                <label class="col-sm-4 col-form-label">Vat</label>
                                <div class="col-sm-8">
                                    <input id="prchasevat" type="text" name="formdata[vat]"  class="form-control " />
                                </div>
                            </div>

                            <div class="row ">
                                <label class="col-sm-4 col-form-label">Others</label>
                                <div class="col-sm-8">
                                    <input id="purchase-others" type="text" name="formdata[others]"  class="form-control " />
                                </div>
                            </div>

                            <div class="row ">
                                <label class="col-sm-4 col-form-label">Total price</label>
                                <div class="col-sm-8">
                                    <input readonly id="prchasetotalprice" value="0" type="text" name="formdata[totalprice]" required class="required form-control " />
                                </div>
                            </div>
                            <button id="calculateid" class="btn btn-success btn-sm float-right">Calculate</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <h4 class="card-title">Payment step 1</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-7">
                            <div class="row" style="margin-left: 15px;">
                                <input  type="file"  name="payment-0[]" multiple/>
                             </div>

                            <div class="form-group bmd-form-group">
                                <label for="address" class="bmd-label-floating">Note</label>
                                <textarea class="form-control" name="Payment[0][note]"></textarea>
                                <input type="hidden" name="Payment[0][serial_number]" value="1"/>
                            </div>

                        </div>
                        <div class="col-5">

                            <div class="row ">
                                <label class="col-sm-4 col-form-label">Pay</label>
                                <div class="col-sm-8">
                                    <input type="text" data-dueid="due-0" name="Payment[0][pay]"  class="required purchasepay form-control " />
                                </div>
                            </div>

                            <div class="row ">
                                <label class="col-sm-4 col-form-label">Due</label>
                                <div class="col-sm-8">
                                    <input id="due-0" type="text" name="Payment[0][due]"  class="form-control " />
                                </div>
                            </div>

                            <div class="row ">
                                <label class="col-sm-4 col-form-label">Payment type</label>
                                <div class="col-sm-8">
                                    <select name="Payment[0][payment_type]" class="form-control" >
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
                                    <input type="text" class="form-control datepicker"  name="Payment[0][pay_date]" placeholder="select date" />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <span id="paymentstep"></span>

            <button id="addpaymentstep"  data-count="1" class="btn btn-info">
                <span class="btn-label">
                    <i class="material-icons">add</i>
                </span>
                Add payment step's
                <div class="ripple-container"></div>
            </button>

            <br/><br/>

            <div class="card-footer ">
                <a href="<?php echo $config::BASEURL . "menus/receiving.php"; ?>" class="btn btn-fill  btn-danger">Cancel</a>
                <button type="submit" class="btn btn-fill btn-success float-right">Save</button>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>

</form>