<?php

include_once '../controller/receivingController.php';

$receivingController = new ReceivingController();

$pageTitle = "Receiving";

$type = $fromhlper->clean_data(isset($_GET['type']) ? $_GET['type'] : "index");

if ($type == "index") {
    $receivingController->index();
    $viewFile = $fromhlper->clean_data($receivingController->viewFile);
    $javaScriptFile = $fromhlper->clean_data($receivingController->javaScriptFile);
    include_once '../template/index.php';
} 


elseif ($type == "addReceiving") {
     $receivingController->addReceiving();
    $viewFile = $fromhlper->clean_data($receivingController->viewFile);
    $javaScriptFile = $fromhlper->clean_data($receivingController->javaScriptFile);
    include_once '../template/index.php';
}

else if($type == "editReceiving"){
    $recevingID = $fromhlper->clean_data(isset($_GET['id']) ? $_GET['id'] : NULL);
    if ($recevingID != NULL) {
        $receive = recevingInfo($recevingID);
        $products = productsInfo($recevingID);
        $receivingController->editReceiving();
        $viewFile = $fromhlper->clean_data($receivingController->viewFile);
        $javaScriptFile = $fromhlper->clean_data($receivingController->javaScriptFile);
        include_once '../template/index.php';
    } else {
        $receivingController->index();
        $viewFile = $fromhlper->clean_data($receivingController->viewFile);
        $javaScriptFile = $fromhlper->clean_data($receivingController->javaScriptFile);
        include_once '../template/index.php';
    }
}

elseif ($type == "deleteReceiving") {
       $recevingID = $fromhlper->clean_data(isset($_GET['id']) ? $_GET['id'] : NULL);
   if($recevingID != NULL){
       deleteReceving($recevingID);
   }
}

else {
    $url = $config::BASEURL . 'menus/dashboard.php';
    header("Location: $url");
    die();
}
