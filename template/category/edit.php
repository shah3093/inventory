<?php
if (!$database->connect()) {
    echo $database->errormsg;
} else {
    $stmt = $database->connection->prepare("SELECT * FROM category WHERE id =:id ");
    $stmt->execute([
        'id' => $categoryID
    ]);
    $result = $stmt->fetch();
    ?>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form method="post" action="<?php echo $config::BASEURL . "controller/categoryController.php"; ?>">
                <div class="card ">
                    <div class="card-header card-header-rose card-header-icon">

                        <h4 class="card-title">Category</h4>
                    </div>
                    <div class="card-body ">
                        <?php if ($categoryName != null): ?>
                            <div class="alert alert-danger text-center" role="alert">
                                <?php echo $categoryName; ?>
                            </div>
                        <?php endif; ?>
                        <select name="formdata[parent]" class="selectpicker form-control" data-size="<?php echo count($categories) + 2; ?>" data-style="btn btn-primary"  tabindex="-98">
                            <option disabled="" selected>Select category</option>
                            <option  <?php echo $result['parent'] == null ? "selected" : ""; ?> value="">None</option>
                            <?php foreach ($categories as $category): if($category['id'] != $result['id']): if($result['id'] != $category['parent']):?>
                                <option <?php echo $result['parent'] == $category['id'] ? "selected" : ""; ?> value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                            <?php endif;endif; endforeach; ?>
                        </select>
                        <br/><br/>
                        <div class="form-group bmd-form-group">
                            <label for="category" class="bmd-label-floating">Name *</label>
                            <input type="text" name="formdata[name]" value="<?php echo $result['name']; ?>" required class="form-control" id="category">
                        </div>

                        <input type="hidden" name="typeofform" value="editForm"/>
                        <input type="hidden" name="categoryID" value="<?php echo $categoryID; ?>" />

                        <div class="form-group bmd-form-group">
                            <label for="description" class="bmd-label-floating">Description</label>
                            <textarea name="formdata[description]"  class="form-control" id="description"><?php echo $result['description']; ?></textarea>
                        </div>

                        <div class="category form-category">* Required fields</div>
                    </div>
                    <div class="card-footer ">
                        <a href="<?php echo $config::BASEURL . "menus/category.php"; ?>" class="btn btn-fill  btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-fill btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php } ?>