<?php

include_once "../config/config.php";
include_once '../library/fromhelper.php';
include_once '../database/database.php';
include_once '../library/sessionHandler.php';

$fromhlper = new Fromhelper();
$database = new Database();
$config = new Config();
$sessionInstance = Session::getInstance();

Class SupplierController {

    public $viewFile;
    public $javaScriptFile = '../script/supplier.js';

    public function index() {
        $this->viewFile = "../template/supplier/index.php";
    }

    public function addSupplier() {
        $this->viewFile = "../template/supplier/add.php";
    }

    public function editSupplier() {
        $this->viewFile = "../template/supplier/edit.php";
    }

}

if ($_POST) {
    $typeofform = $fromhlper->clean_data($_POST['typeofform']);
    if ($typeofform == "addForm") {
        if (!$database->connect()) {
            echo $database->errormsg;
        } else {
            $_POST['formdata']['create_date'] = date('Y-m-d H:i:s');
            $imagename = imageupload($_FILES['cusimage']['name']);
            $_POST['formdata']['image'] = $imagename;
            $formdata = $_POST['formdata'];
            $stmt = $database->insert("supplier", $formdata);
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
            $supplierID = $_POST['supplierid'];
            $_POST['formdata']['updtae_date'] = date('Y-m-d H:i:s');
            $img = $_FILES['cusimage']['name'];
            if ($img != null) {
                deleteimg($customerid);
                $imagename = imageupload($_FILES['cusimage']['name']);
                $_POST['formdata']['image'] = $imagename;
            }

            $formdata = $_POST['formdata'];
            $stmt = $database->update("supplier", $formdata, $supplierID);
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

function imageupload($imagename) {
    if ($imagename != null) {
        $target_dir = "../assets/uploads/";
        $filename = "supplier-" . rand(10, 10000) . "-" . basename($imagename);
        $target_file = $target_dir . $filename;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit();
        }
        if (move_uploaded_file($_FILES["cusimage"]["tmp_name"], $target_file)) {
            return $filename;
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    } else {
        return NULL;
    }
}

function deleteimg($id) {
    $product = supplierInfo($id);
    if ($product['image'] != NULL) {
        $target = '../assets/uploads/' . $product['image'];
        if (@unlink($target)) {
            return;
        } else {
            echo "Image delete failed";
        }
    }
}

function sendfeedback($data) {
    $config = new Config();
    $data = http_build_query($data);
    $url = $config::BASEURL . 'menus/supplier.php?' . $data;
    header("Location: $url");
    die();
}

function supplierInfo($supplierID) {
    $database = new Database();
    if (!$database->connect()) {
        echo $database->errormsg;
        exit();
    } else {
        $stmt = $database->connection->prepare("SELECT * FROM supplier WHERE id =:id ");
        $stmt->execute([
            'id' => $supplierID
        ]);
        return $stmt->fetch();
    }
}

function deleteSupplier($customerID) {
    $database = new Database();
    if (!$database->connect()) {
        echo $database->errormsg;
    } else {
        deleteimg($customerID);
        $stmt = $database->delete("supplier", $customerID);
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
