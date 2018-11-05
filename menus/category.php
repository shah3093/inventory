<?php

include_once '../controller/categoryController.php';

$categoryController = new CategoryController();

$pageTitle = "Category";

$type = $fromhlper->clean_data(isset($_GET['type']) ? $_GET['type'] : "index");

if ($type == "index") {
    $categoryController->index();
    $viewFile = $fromhlper->clean_data($categoryController->viewFile);
    $javaScriptFile = $fromhlper->clean_data($categoryController->javaScriptFile);
    include_once '../template/index.php';
} 

elseif ($type == "addCategory") {
    $categoryName = $fromhlper->clean_data(isset($_GET['categoryName']) ? 'Category Name is required' : "");
    $categoryController->addCategory();
    $viewFile = $fromhlper->clean_data($categoryController->viewFile);
    $javaScriptFile = $fromhlper->clean_data($categoryController->javaScriptFile);
    include_once '../template/index.php';
} 

elseif ($type == "editCategory") {
    $categoryID = $fromhlper->clean_data(isset($_GET['id']) ? $_GET['id'] : NULL);
    if ($categoryID != NULL) {
        $categoryName = $fromhlper->clean_data(isset($_GET['categoryName']) ? 'Category Name is required' : "");
        $categoryController->editCategory($categoryID);
        $viewFile = $fromhlper->clean_data($categoryController->viewFile);
        $javaScriptFile = $fromhlper->clean_data($categoryController->javaScriptFile);
        include_once '../template/index.php';
    } else {
        $categoryController->index();
        $viewFile = $fromhlper->clean_data($categoryController->viewFile);
        $javaScriptFile = $fromhlper->clean_data($categoryController->javaScriptFile);
        include_once '../template/index.php';
    }
}


else if($type == "deleteCategory"){
    $categoryID = $fromhlper->clean_data(isset($_GET['id']) ? $_GET['id'] : NULL);
   if($categoryID != NULL){
       deleteCategory($categoryID);
   }
}

else {
    $url = $config::BASEURL . 'menus/dashboard.php';
    header("Location: $url");
    die();
}
