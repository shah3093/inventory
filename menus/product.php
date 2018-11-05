<?php

include_once '../controller/productController.php';

$productController = new ProductController();

$pageTitle = "Product";

$type = $fromhlper->clean_data(isset($_GET['type']) ? $_GET['type'] : "index");

if ($type == "index") {
    $productController->index();
    $viewFile = $fromhlper->clean_data($productController->viewFile);
    $javaScriptFile = $fromhlper->clean_data($productController->javaScriptFile);
    include_once '../template/index.php';
} 

elseif ($type == "addProduct") {
   $categories =  categories();
    $productController->addProduct();
    $viewFile = $fromhlper->clean_data($productController->viewFile);
    $javaScriptFile = $fromhlper->clean_data($productController->javaScriptFile);
    include_once '../template/index.php';
}

else if($type == "editProduct"){
    $productID = $fromhlper->clean_data(isset($_GET['id']) ? $_GET['id'] : NULL);
    if ($productID != NULL) {
        $categories =  categories();
        $product = productInfo($productID);
        $productController->editProduct();
        $viewFile = $fromhlper->clean_data($productController->viewFile);
        $javaScriptFile = $fromhlper->clean_data($productController->javaScriptFile);
        include_once '../template/index.php';
    } else {
        $productController->index();
        $viewFile = $fromhlper->clean_data($productController->viewFile);
        $javaScriptFile = $fromhlper->clean_data($productController->javaScriptFile);
        include_once '../template/index.php';
    }
}

else if($type == "deleteProduct"){
    $categoryID = $fromhlper->clean_data(isset($_GET['id']) ? $_GET['id'] : NULL);
   if($categoryID != NULL){
       deleteProduct($categoryID);
   }
}


else {
    $url = $config::BASEURL . 'menus/dashboard.php';
    header("Location: $url");
    die();
}