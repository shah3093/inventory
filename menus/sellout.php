<?php

include_once '../controller/selloutController.php';

$selloutController = new SelloutController();

$pageTitle = "Sell out";
$bodyClass = "sidebar-mini";

$type = $fromhlper->clean_data(isset($_GET['type']) ? $_GET['type'] : "index");

if ($type == "index") {
    $selloutController->index();
    $viewFile = $fromhlper->clean_data($selloutController->viewFile);
    $javaScriptFile = $fromhlper->clean_data($selloutController->javaScriptFile);
    include_once '../template/index.php';
} 