<?php
if (!$database->connect()) {
    echo $database->errormsg;
} else {
    $stmt = $database->connection->prepare("SELECT * FROM customer");
    $stmt->execute();
    $results = $stmt->fetchAll();
    ?>

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
                            <h4 class="card-title">Customer</h4>
                        </div>
                        <div class="col-md-6">
                            <a href="<?php echo $config::BASEURL . "menus/customer.php?type=addCustomer"; ?>" class="btn btn-info float-right">
                                <span class="btn-label">
                                    <i class="material-icons">add</i>
                                </span>
                                Add customer
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
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables_info" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th >Name</th>
                                                <th rowspan="1" colspan="1">Email</th>
                                                <th class="text-right" >Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th rowspan="1" colspan="1">Email</th>
                                                <th class="text-right" >Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php foreach ($results as $result): ?>
                                                <tr role="row">
                                                    <td><?php echo $result['name']; ?></td>
                                                    <td><?php echo $result['email']; ?></td>
                                                    <td class="text-right">
                                                        <?php
                                                        $passData = array(
                                                            'id' => $result['id'],
                                                            'type' => 'editCustomer'
                                                        );
                                                        $passData = http_build_query($passData);
                                                        ?>
                                                        <a
                                                            href="<?php echo $config::BASEURL . "menus/customer.php?" . $passData; ?>"
                                                            class="btn btn-link btn-warning btn-just-icon edit">
                                                            <i class="material-icons">edit</i>
                                                        </a>
                                                        <?php
                                                        $passData = array(
                                                            'id' => $result['id'],
                                                            'type' => 'deleteCustomer'
                                                        );
                                                        $passData = http_build_query($passData);
                                                        ?>
                                                        <a 
                                                            data-href="<?php echo $config::BASEURL . "menus/customer.php?" . $passData; ?>" 
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

    <?php
}
?>

