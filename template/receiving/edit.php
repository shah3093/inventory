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
                                    <option disabled>Select supplier</option>
                                    <option value="createnew">Create new</option>
                                    <?php foreach ($suppliers as $supplier): ?>
                                        <option <?php echo $supplier['id'] == $receive['supplier_id'] ? "selected" : ""; ?> value="<?php echo $supplier['id']; ?>"><?php echo $supplier['shop_name']; ?></option>
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

                    <?php foreach ($products as $i=>$product): ?>
                        <div class="row">
                            <div class="col-5">
                                <div class="form-group bmd-form-group">
                                    <label for="suppliername" class="bmd-label-floating">Product name </label>
                                    <input value="<?php echo $product['name']; ?>" type="text" name="product[<?php echo $i; ?>][name]"  class="form-control " />
                                    <input type="hidden" name="product[<?php echo $i; ?>][id]" value="<?php echo $product['id']; ?>" />
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group bmd-form-group">
                                    <label for="address" class="bmd-label-floating">Purchase price</label>
                                    <input value="<?php echo $product['purchase_price']; ?>" type="text" name="product[<?php echo $i; ?>][purchase_price]"  class="form-control purchaseprice" />
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group bmd-form-group">
                                    <label for="address" class="bmd-label-floating">Stock</label>
                                    <input type="text" value="<?php echo $product['stock']; ?>" name="product[<?php echo $i; ?>][stock]"  class="form-control stock" >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group bmd-form-group">
                                    <label for="address" class="bmd-label-floating">Unit</label>
                                    <input type="text" value="<?php echo $product['measurementunit']; ?>" name="product[<?php echo $i; ?>][measurementunit]"  class="form-control " />
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

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
                                    <input type="text" class="form-control datepicker" value="<?php echo $receive['receive_date']; ?>"  name="formdata[receive_date]" placeholder="select date" />
                                </div>
                            </div>

                            <div class="form-group bmd-form-group">
                                <label for="address" class="bmd-label-floating">Note</label>
                                <textarea class="form-control" name="formdata[note]"><?php echo $receive['note']; ?></textarea>
                                <input type="hidden" name="typeofform" value="editForm" />
                                <input type="hidden" name="receiveid" value="<?php echo $receive['id']; ?>" />
                            </div>

                        </div>
                        <div class="col-5">

                            <div class="row ">
                                <label class="col-sm-4 col-form-label">Vat</label>
                                <div class="col-sm-8">
                                    <input id="prchasevat" type="text" name="formdata[vat]" value="<?php echo $receive['vat']; ?>" class="form-control " />
                                </div>
                            </div>

                            <div class="row ">
                                <label class="col-sm-4 col-form-label">Others</label>
                                <div class="col-sm-8">
                                    <input id="purchase-others" type="text" name="formdata[others]" value="<?php echo $receive['others']; ?>" class="form-control " />
                                </div>
                            </div>

                            <div class="row ">
                                <label class="col-sm-4 col-form-label">Total price</label>
                                <div class="col-sm-8">
                                    <input readonly id="prchasetotalprice" value="<?php echo $receive['totalprice']; ?>" type="text" name="formdata[totalprice]" required class="required form-control " />
                                </div>
                            </div>
                            <button id="calculateid" class="btn btn-success btn-sm float-right">Calculate</button>
                        </div>
                    </div>
                </div>
            </div>

            <?php foreach ($payments as $payment): ?>
                <?php
                $assets = select_rows("assets", ["table_name" => "payment", "table_id" => $payment['id']]);
                ?>
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <h4 class="card-title">Payment step <?php echo $payment['serial_number']; ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-7">
                                <div class="row" style="margin-left: 15px;">
                                    <div class="col-md-12">
                                        <?php if (count($assets) > 0): ?>
                                            <div class="row" style="margin-bottom: 20px">

                                                <?php foreach ($assets as $asset): ?>   
                                                    <div id="thumbnail-<?php echo $asset['id']; ?>" class="thumbnail">
                                                        <a target="_blank" href="../assets/uploads/<?php echo $asset['file_name']; ?>">
                                                            <img src="../assets/uploads/<?php echo $asset['file_name']; ?>" alt="Lights" class="paymnetimag">
                                                            <div class="caption text-center">
                                                                <button data-divid="thumbnail-<?php echo $asset['id']; ?>" data-imageid="<?php echo $asset['id']; ?>" class="deleteasset btn btn-danger btn-round btn-fab btn-sm">
                                                                    <i class="material-icons">delete</i>
                                                                    <div class="ripple-container"></div>
                                                                </button>
                                                            </div>
                                                        </a>
                                                    </div>
                                                <?php endforeach; ?>

                                            </div>
                                        <?php endif; ?>
                                        <div class="row" style="margin-bottom: 15px">
                                            <div class="col-md-12" >
                                                <input  type="file"  name="payment-<?php echo $payment['serial_number']; ?>[]" multiple/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group bmd-form-group">
                                    <label for="address" class="bmd-label-floating">Note</label>
                                    <textarea class="form-control" name="Payment[<?php echo $payment['serial_number']; ?>][note]"><?php echo $payment['note']; ?></textarea>
                                    <input type="hidden" name="Payment[<?php echo $payment['serial_number']; ?>][serial_number]" value="<?php echo $payment['serial_number']; ?>"/>
                                    <input type="hidden" name="Payment[<?php echo $payment['serial_number']; ?>][id]" value="<?php echo $payment['id']; ?>"/>
                                
                                </div>

                            </div>
                            <div class="col-5">

                                <div class="row ">
                                    <label class="col-sm-4 col-form-label">Pay</label>
                                    <div class="col-sm-8">
                                        <input type="text" data-dueprevid="due-<?php echo $payment['serial_number']-1; ?>" data-dueid="due-<?php echo $payment['serial_number']; ?>" name="Payment[<?php echo $payment['serial_number']; ?>][pay]" value="<?php echo $payment['pay']; ?>" class="required purchasepay form-control " />
                                    </div>
                                </div>

                                <div class="row ">
                                    <label class="col-sm-4 col-form-label">Due</label>
                                    <div class="col-sm-8">
                                        <input id="due-<?php echo $payment['serial_number']; ?>" type="text" name="Payment[<?php echo $payment['serial_number']; ?>][due]" value="<?php echo $payment['due']; ?>"  class="form-control " />
                                    </div>
                                </div>

                                <div class="row ">
                                    <label class="col-sm-4 col-form-label">Payment type</label>
                                    <div class="col-sm-8">
                                        <select name="Payment[<?php echo $payment['serial_number']; ?>][payment_type]" class="form-control" >
                                            <option <?php echo $payment['payment_type'] == "CASH" ? "selected" : ""; ?> value="CASH">Cash</option>
                                            <option <?php echo $payment['payment_type'] == "CHEQUE" ? "selected" : ""; ?> value="CHEQUE">Cheque</option>
                                            <option <?php echo $payment['payment_type'] == "CASH + CHEQUE" ? "selected" : ""; ?> value="CASH + CHEQUE">Cash + Cheque</option>
                                            <option <?php echo $payment['payment_type'] == "OTHERS" ? "selected" : ""; ?> value="OTHERS">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <br/>

                                <div class="row ">
                                    <label class="col-sm-4 col-form-label">Paid date</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control datepicker"  name="Payment[<?php echo $payment['serial_number']; ?>][pay_date]" value="<?php echo $payment['pay_date']; ?>"/>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

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