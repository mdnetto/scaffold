<?php

require __DIR__  . '/../../vendor/autoload.php';

$controller = new Dvd_rental\Controllers\CategoryController();

$controller->view($_GET['id'], "");

