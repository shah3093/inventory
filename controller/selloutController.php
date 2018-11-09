<?php

include_once "../config/config.php";
include_once '../library/fromhelper.php';
include_once '../database/database.php';
include_once '../library/sessionHandler.php';

$fromhlper = new Fromhelper();
$database = new Database();
$config = new Config();
$sessionInstance = Session::getInstance();

Class SelloutController {

    public $viewFile;
    public $javaScriptFile = '../script/sellout.js';

    public function index() {
        $this->viewFile = "../template/sellout/index.php";
    }

}
