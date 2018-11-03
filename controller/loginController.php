<?php

include_once "../config/config.php";
include_once '../library/fromhelper.php';
include_once '../database/database.php';
include_once '../library/sessionHandler.php';

$fromhlper = new Fromhelper();
$database = new Database();
$config = new Config();

$email = NULL;
$password = NULL;

if ($_POST) {
    $email = $fromhlper->clean_data($_POST['email']);
    $password = $fromhlper->clean_data($_POST['password']);

    if ($email == null) {
        $data = array(
            'email' => "emailIsNull"
        );
        sendfeedback($data);
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $data = array(
            'email' => "emailIsNotValid"
        );
        sendfeedback($data);
    }

    if ($password == null) {
        $data = array(
            'email' => $email,
            'password' => "passwordIsNull"
        );
        sendfeedback($data);
    }


    $connection = $database->connect();

    if (!$connection) {
        echo $database->errormsg;
    } else {
        $stmt = $database->connection->prepare("SELECT * FROM admin WHERE email=:email AND password=:password");
        $stmt->execute([
            'email' => $email,
            'password' => md5($password)
        ]);
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {

                $sessionInstance = Session::getInstance();
                $sessionInstance->adminName = $row['name'];
                $sessionInstance->adminEmail = $row['email'];
                $sessionInstance->adminPhone = $row['phone'];

                $url = $config::BASEURL . 'menus/dashboard.php';
                header("Location: $url");
                die();
            }
        } else {
            $data = array(
                'email' => "emailOrPassNotMatched"
            );
            sendfeedback($data);
        }
    }
} else {
    $config = new Config();
    $url = $config::BASEURL . 'template/login.php';
    header("Location: $url");
    die();
}

function sendfeedback($data) {
    $config = new Config();
    $data = http_build_query($data);
    $url = $config::BASEURL . 'template/login.php?' . $data;
    header("Location: $url");
    die();
}
