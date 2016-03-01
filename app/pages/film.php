<?php

require __DIR__  . '/../../vendor/autoload.php';

$controller = new Dvd_rental\Controllers\FilmController();

if (isset($_GET['id'])) {
  $controller->view($_GET['id'], 'film_id');
} else {
  $controller->index();
}

