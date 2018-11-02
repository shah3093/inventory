<?php

include_once './config/config.php';
include_once './library/sessionHandler.php';
$config = new Config();


if (session_id() != "") {
    $url = $config::BASEURL . 'template/index.php';
    header("Location: $url");
    die();
} else {
    $url = $config::BASEURL . 'template/login.php';
    header("Location: $url");
    die();
}

