<?php

include_once '../controller/dashboardController.php';


$viewFile = $fromhlper->clean_data(index());
include_once '../template/index.php';

