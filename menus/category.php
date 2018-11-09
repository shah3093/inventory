<?php

include_once '../controller/categoryController.php';
include_once '../database/selectquery.php';

$categoryController = new CategoryController();

$pageTitle = "Category";

$type = $fromhlper->clean_data(isset($_GET['type']) ? $_GET['type'] : "index");
$categories = select_rows("category",null,"id DESC");

if ($type == "index") {
    $categoryController->index();
      $results = select_rows("category",null,"id DESC");
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
        $categoryController->editCategory();
        $result = select_singlerow("category", ["id"=>$categoryID]);
        $viewFile = $fromhlper->clean_data($categoryController->viewFile);
        $javaScriptFile = $fromhlper->clean_data($categoryController->javaScriptFile);
        include_once '../template/index.php';
    } else {
        $categoryController->index();
          $results = select_rows("category");
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
