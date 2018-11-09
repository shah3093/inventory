<?php

include_once '../controller/supplierController.php';

$supplierController = new SupplierController();

$pageTitle = "Supplier";

$type = $fromhlper->clean_data(isset($_GET['type']) ? $_GET['type'] : "index");

if ($type == "index") {
    $supplierController->index();
    $viewFile = $fromhlper->clean_data($supplierController->viewFile);
    $javaScriptFile = $fromhlper->clean_data($supplierController->javaScriptFile);
    include_once '../template/index.php';
} 


elseif ($type == "addSupplier") {
  $supplierController->addSupplier();
    $viewFile = $fromhlper->clean_data($supplierController->viewFile);
    $javaScriptFile = $fromhlper->clean_data($supplierController->javaScriptFile);
    include_once '../template/index.php';
} 

elseif ($type == "editSupplier") {
   $id = $fromhlper->clean_data(isset($_GET['id']) ? $_GET['id'] : NULL);
    if ($id != NULL) {
        $supplier = supplierInfo($id);
        $supplierController->editSupplier();
        $viewFile = $fromhlper->clean_data($supplierController->viewFile);
        $javaScriptFile = $fromhlper->clean_data($supplierController->javaScriptFile);
        include_once '../template/index.php';
    } else {
        $supplierController->index();
        $viewFile = $fromhlper->clean_data($supplierController->viewFile);
        $javaScriptFile = $fromhlper->clean_data($supplierController->javaScriptFile);
        include_once '../template/index.php';
    }
}

else if($type == "deleteSupplier"){
    $id = $fromhlper->clean_data(isset($_GET['id']) ? $_GET['id'] : NULL);
   if($id != NULL){
       deleteSupplier($id);
   }
}


else {
    $url = $config::BASEURL . 'menus/dashboard.php';
    header("Location: $url");
    die();
}