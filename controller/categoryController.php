<?php

include_once "../config/config.php";
include_once '../library/fromhelper.php';
include_once '../database/database.php';
include_once '../library/sessionHandler.php';

$fromhlper = new Fromhelper();
$database = new Database();
$config = new Config();
$sessionInstance = Session::getInstance();

Class CategoryController {

    public $viewFile;
    public $javaScriptFile = '../script/category.js';

    public function index() {
        $this->viewFile = "../template/category/index.php";
    }

    public function addCategory() {
        $this->viewFile = "../template/category/add.php";
    }

    public function editCategory() {
        $this->viewFile = "../template/category/edit.php";
    }

}

if ($_POST) {
    $typeofform = $fromhlper->clean_data($_POST['typeofform']);

    $categoryName = $fromhlper->clean_data($_POST['formdata']['name']);

    if ($categoryName == null) {
        $data = array(
            'categoryName' => "nameIsEmpty",
            'type' => 'addCategory'
        );
        sendfeedback($data);
    }

    if ($typeofform == "addForm") {
        if (!$database->connect()) {
            echo $database->errormsg;
        } else {
            $_POST['formdata']['create_date'] = date('Y-m-d H:i:s');
            $formdata = $_POST['formdata'];
            $stmt = $database->insert("category", $formdata);
            if ($stmt != "ERROR") {
                $data = array(
                    'type' => 'index'
                );
                sendfeedback($data);
            } else {
                echo "Something wrong";
            }
        }
    } elseif ($typeofform == "editForm") {
        if (!$database->connect()) {
            echo $database->errormsg;
        } else {
            $categoryID = $_POST['categoryID'];
            $_POST['formdata']['updtae_date'] = date('Y-m-d H:i:s');
            $formdata = $_POST['formdata'];
            $stmt = $database->update("category", $formdata, $categoryID);
            if ($stmt == "DONE") {
                $data = array(
                    'type' => 'index'
                );
                sendfeedback($data);
            } else {
                echo "Something wrong";
            }
        }
    }
}

function deleteCategory($categoryID) {
    $database = new Database();
    if (!$database->connect()) {
        echo $database->errormsg;
    } else {
        $stmt = $database->delete("category", $categoryID);
        if ($stmt == "DONE") {
            $data = array(
                'type' => 'index'
            );
            sendfeedback($data);
        } else {
            echo "Something wrong";
        }
    }
}

function sendfeedback($data) {
    $config = new Config();
    $data = http_build_query($data);
    $url = $config::BASEURL . 'menus/category.php?' . $data;
    header("Location: $url");
    die();
}
