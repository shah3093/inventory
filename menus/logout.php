<?php

include_once '../config/config.php';
include_once '../library/sessionHandler.php';
$config = new Config();
$sessionInstance = Session::getInstance();


$sessionInstance->destroy();
$url = $config::BASEURL . 'template/login.php';
header("Location: $url");
die();
