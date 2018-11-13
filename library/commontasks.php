<?php

include_once '../database/database.php';
include_once '../database/commonquery.php';

$database = new Database();


if (isset($_POST['type'])) {
    $type = $_POST['type'];
    if ($type == "deleteasset") {
        deleteasset($_POST['id']);
    }
}

function deleteasset($id) {
    $product = select_singlerow("assets", ['id' => $id]);
    if ($product['file_name'] != NULL) {
        $target = '../assets/uploads/' . $product['file_name'];
        if (@unlink($target)) {
            $database = new Database();
            if (!$database->connect()) {
                echo $database->errormsg;
            } else {
                $stmt = $database->delete("assets", $id);
                if ($stmt == "DONE") {
                    echo "DONE";
                } else {
                    echo "ERROR";
                }
            }
        } else {
            echo "Image delete failed";
        }
    }
}
