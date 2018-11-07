<?php

include_once "../config/config.php";
include_once '../library/fromhelper.php';
include_once '../database/database.php';
include_once '../library/sessionHandler.php';

$fromhlper = new Fromhelper();
$database = new Database();
$config = new Config();
$sessionInstance = Session::getInstance();

Class ProductController {

    public $viewFile;
    public $javaScriptFile = '../script/product.js';

    public function index() {
        $this->viewFile = "../template/product/index.php";
    }

    public function addProduct() {
        $this->viewFile = "../template/product/add.php";
    }

    public function editProduct() {
        $this->viewFile = "../template/product/edit.php";
    }

}

function categories() {
    $database = new Database();
    $database->connect();
    $stmt = $database->connection->prepare("SELECT * FROM category ");
    $stmt->execute();
    $categories = $stmt->fetchAll();
    return $categories;
}

function productInfo($productID) {
    $database = new Database();
    if (!$database->connect()) {
        echo $database->errormsg;
        exit();
    } else {
        $stmt = $database->connection->prepare("SELECT * FROM product WHERE id =:id ");
        $stmt->execute([
            'id' => $productID
        ]);
        return $stmt->fetch();
    }
}

if ($_POST) {
    $typeofform = $fromhlper->clean_data($_POST['typeofform']);
    if ($typeofform == "addForm") {
        if (!$database->connect()) {
            echo $database->errormsg;
        } else {
            $_POST['formdata']['create_date'] = date('Y-m-d H:i:s');

            $imagename = imageupload($_FILES['productimg']['name']);
            $_POST['formdata']['image'] = $imagename;
            $formdata = $_POST['formdata'];
            $stmt = $database->insert("product", $formdata);
            if ($stmt != "ERROR") {
                $data = array(
                    'type' => 'index'
                );
                sendfeedback($data);
            } else {
                echo "Something wrong";
            }
        }
    } else if ($typeofform == "editForm") {
        if (!$database->connect()) {
            echo $database->errormsg;
        } else {
            $productID = $_POST['productid'];
            $_POST['formdata']['updtae_date'] = date('Y-m-d H:i:s');
            $img = $_FILES['productimg']['name'];
            if ($img != null) {
                deleteimg($productID);
                $imagename = imageupload($_FILES['productimg']['name']);
                $_POST['formdata']['image'] = $imagename;
            }

            $formdata = $_POST['formdata'];
            $stmt = $database->update("product", $formdata, $productID);
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

function sendfeedback($data) {
    $config = new Config();
    $data = http_build_query($data);
    $url = $config::BASEURL . 'menus/product.php?' . $data;
    header("Location: $url");
    die();
}

function imageupload($imagename) {
    if ($imagename != null) {
        $target_dir = "../assets/uploads/";
        $filename = "product-" . rand(10, 10000) . "-" . basename($imagename);
        $target_file = $target_dir . $filename;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit();
        }
        if (move_uploaded_file($_FILES["productimg"]["tmp_name"], $target_file)) {
            return $filename;
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    } else {
        return NULL;
    }
}

function deleteimg($productID) {
    $product = productInfo($productID);
    if ($product['image'] != NULL) {
        $target = '../assets/uploads/' . $product['image'];
        if (@unlink($target)) {
            return;
        } else {
            echo "Image delete failed";
        }
    }
}

function deleteProduct($productID) {
    $database = new Database();
    if (!$database->connect()) {
        echo $database->errormsg;
    } else {
        deleteimg($productID);
        $stmt = $database->delete("product", $productID);
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
