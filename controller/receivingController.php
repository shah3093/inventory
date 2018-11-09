<?php

include_once "../config/config.php";
include_once '../library/fromhelper.php';
include_once '../database/database.php';
include_once '../database/selectquery.php';
include_once '../library/sessionHandler.php';

$fromhlper = new Fromhelper();
$database = new Database();
$config = new Config();
$sessionInstance = Session::getInstance();

Class ReceivingController {

    public $viewFile;
    public $javaScriptFile = '../script/receiving.js';

    public function index() {
        $this->viewFile = "../template/receiving/index.php";
    }

    public function addReceiving() {
        $this->viewFile = "../template/receiving/add.php";
    }

    public function editReceiving() {
        $this->viewFile = "../template/receiving/edit.php";
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
            $stmt = $database->insert("receiving", $formdata);
            if ($stmt != "ERROR") {
                foreach ($_POST['product'] as $product) {
                    $product['receving_id'] = $stmt;

                    $tmpdata = trim($product['name']);
                    $tmpdata = stripcslashes($tmpdata);
                    $tmpdata = htmlspecialchars($tmpdata);

                    if ($tmpdata != null) {
                        $stmt2 = $database->insert("product", $product);
                    }
                }

                $data = array(
                    'type' => 'index'
                );
                sendfeedback($data);
            } else {
                echo "Something wrong";
            }
        }
    } else if ($typeofform == "deletesingleproduct") {
        $database = new Database();
        if (!$database->connect()) {
            echo $database->errormsg;
        } else {
            $productID = $_POST['productid'];
            deleteimg("product", $productID);
            $stmt = $database->delete("product", $productID);
            if ($stmt == "DONE") {
                $data = array(
                    'type' => 'index'
                );
                echo "DONE";
            } else {
                echo "ERROR";
            }
        }
    } else if ($typeofform == "editForm") {
        if (!$database->connect()) {
            echo $database->errormsg;
        } else {
            $receiveid = $_POST['receiveid'];
            $_POST['formdata']['updtae_date'] = date('Y-m-d H:i:s');
            $img = $_FILES['productimg']['name'];
            if ($img != null) {
                deleteimg("receive", $receiveid);
                $imagename = imageupload($_FILES['productimg']['name']);
                $_POST['formdata']['image'] = $imagename;
            }

            $formdata = $_POST['formdata'];
            $stmt = $database->update("receiving", $formdata, $receiveid);
            if ($stmt == "DONE") {

                foreach ($_POST['product'] as $product) {
                    $tmpdata = trim($product['name']);
                    $tmpdata = stripcslashes($tmpdata);
                    $tmpdata = htmlspecialchars($tmpdata);

                    if (isset($product['id'])) {
                        $productID = $product['id'];
                        if ($tmpdata != null) {
                            $stmt2 = $database->update("product", $product, $productID);
                        }
                    } else {
                        $product['receving_id'] = $receiveid;
                        if ($tmpdata != null) {
                            $stmt2 = $database->insert("product", $product);
                        }
                    }
                }


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

function deleteimg($type, $id) {
    if ($type != "receive") {
        $product = select_singlerow("product", ['id'=>$id]);
    } else {
        $product = select_singlerow("receiving", ['id'=>$id]);
    }

    if ($product['image'] != NULL) {
        $target = '../assets/uploads/' . $product['image'];
        if (@unlink($target)) {
            return;
        } else {
            echo "Image delete failed";
        }
    }
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

function sendfeedback($data) {
    $config = new Config();
    $data = http_build_query($data);
    $url = $config::BASEURL . 'menus/receiving.php?' . $data;
    header("Location: $url");
    die();
}



function deleteReceving($receiveID) {
    $database = new Database();
    if (!$database->connect()) {
        echo $database->errormsg;
    } else {
        deleteimg("receive", $receiveID);
        $stmt = $database->delete("receiving", $receiveID);
        $products = productsInfo($receiveID);
        foreach ($products as $product) {
            deleteimg("product", $product['id']);
            $stmt = $database->delete("product", $product['id']);
        }
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

function suppliers() {
    
}
