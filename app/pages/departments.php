<?php

require __DIR__  . '/../../vendor/autoload.php';

$controller = new Company\Controllers\DepartmentController();

if (isset($_GET['id'])) {
  $controller->view($_GET['id']);
} else {
  $controller->index();
}

