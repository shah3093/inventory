

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h4 class="card-title">Categories</h4>
                        </div>
                        <div class="col-md-6">
                            <a href="<?php echo $config::BASEURL . "menus/category.php?type=addCategory"; ?>" class="btn btn-info float-right">
                                <span class="btn-label">
                                    <i class="material-icons">add</i>
                                </span>
                                Add category
                                <div class="ripple-container"></div></a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="material-datatables">
                        <div id="datatables_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <script>
                                    targets = [2,4];
                                    </script>
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables_info" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th >Name</th>
                                                <th id="parent">Parent</th>
                                                <th rowspan="1" colspan="1">Description</th>
                                                <th class="text-right" >Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Parent</th>
                                                <th rowspan="1" colspan="1">Description</th>
                                                <th class="text-right" >Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php $i=1; foreach ($results as $result): ?>
                                                <tr role="row">
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $result['name']; ?></td>
                                                    <?php
                                                    $par = select_singlerow("category", ['id'=>$result['parent']])
                                                    ?>
                                                    <td><?php echo $par['name']; ?></td>
                                                    <td><?php echo $result['description']; ?></td>
                                                    <td class="text-right">
                                                        <?php
                                                        $passData = array(
                                                            'id' => $result['id'],
                                                            'type' => 'editCategory'
                                                        );
                                                        $passData = http_build_query($passData);
                                                        ?>
                                                        <a
                                                            href="<?php echo $config::BASEURL . "menus/category.php?" . $passData; ?>"
                                                            class="btn btn-link btn-warning btn-just-icon edit">
                                                            <i class="material-icons">edit</i>
                                                        </a>
                                                        <?php
                                                        $passData = array(
                                                            'id' => $result['id'],
                                                            'type' => 'deleteCategory'
                                                        );
                                                        $passData = http_build_query($passData);
                                                        ?>
                                                        <a 
                                                            data-href="<?php echo $config::BASEURL . "menus/category.php?" . $passData; ?>" 
                                                            class="btn btn-link btn-danger btn-just-icon remove">
                                                            <i class="material-icons">delete</i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end content-->
            </div>
            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>



