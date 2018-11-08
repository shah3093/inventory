<?php

include_once '../controller/customerController.php';

$customerController = new CustomerController();

$pageTitle = "Customer";

$type = $fromhlper->clean_data(isset($_GET['type']) ? $_GET['type'] : "index");

if ($type == "index") {
    $customerController->index();
    $viewFile = $fromhlper->clean_data($customerController->viewFile);
    $javaScriptFile = $fromhlper->clean_data($customerController->javaScriptFile);
    include_once '../template/index.php';
} 


elseif ($type == "addCustomer") {
  $customerController->addCustomer();
    $viewFile = $fromhlper->clean_data($customerController->viewFile);
    $javaScriptFile = $fromhlper->clean_data($customerController->javaScriptFile);
    include_once '../template/index.php';
} 

elseif ($type == "editCustomer") {
   $id = $fromhlper->clean_data(isset($_GET['id']) ? $_GET['id'] : NULL);
    if ($id != NULL) {
        $customer = customerInfo($id);
        $customerController->editCustomer();
        $viewFile = $fromhlper->clean_data($customerController->viewFile);
        $javaScriptFile = $fromhlper->clean_data($customerController->javaScriptFile);
        include_once '../template/index.php';
    } else {
        $customerController->index();
        $viewFile = $fromhlper->clean_data($customerController->viewFile);
        $javaScriptFile = $fromhlper->clean_data($customerController->javaScriptFile);
        include_once '../template/index.php';
    }
} 


else if($type == "deleteCustomer"){
    $customerID = $fromhlper->clean_data(isset($_GET['id']) ? $_GET['id'] : NULL);
   if($customerID != NULL){
       deleteCustomer($customerID);
   }
}


else {
    $url = $config::BASEURL . 'menus/dashboard.php';
    header("Location: $url");
    die();
}