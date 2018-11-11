<?php

include_once '../controller/receivingController.php';
include_once '../database/selectquery.php';

$receivingController = new ReceivingController();

$pageTitle = "Receiving";

$type = $fromhlper->clean_data(isset($_GET['type']) ? $_GET['type'] : "index");

if ($type == "index") {
    $receivingController->index();
    $viewFile = $fromhlper->clean_data($receivingController->viewFile);
    $javaScriptFile = $receivingController->javaScriptFile;
    include_once '../template/index.php';
} 


elseif ($type == "addReceiving") {
    $suppliers = select_rows("supplier");
     $receivingController->addReceiving();
    $viewFile = $fromhlper->clean_data($receivingController->viewFile);
    $javaScriptFile = $receivingController->javaScriptFile;
    include_once '../template/index.php';
}

else if($type == "editReceiving"){
    $recevingID = $fromhlper->clean_data(isset($_GET['id']) ? $_GET['id'] : NULL);
    if ($recevingID != NULL) {
        $receive = select_singlerow("receiving", ["id"=>$recevingID]);
        $products = select_rows("product", ["receving_id" => $recevingID]);
        $receivingController->editReceiving();
        $viewFile = $fromhlper->clean_data($receivingController->viewFile);
        $javaScriptFile = $receivingController->javaScriptFile;
        include_once '../template/index.php';
    } else {
        $receivingController->index();
        $viewFile = $fromhlper->clean_data($receivingController->viewFile);
        $javaScriptFile = $receivingController->javaScriptFile;
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
