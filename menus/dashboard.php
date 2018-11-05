<?php

include_once '../controller/dashboardController.php';

$pageTitle = "Dashboard";

$viewFile = $fromhlper->clean_data(index());
include_once '../template/index.php';

