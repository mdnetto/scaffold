<?php
//Search taken from here:
//http://mrbool.com/how-to-create-your-own-search-engine-with-php-and-mysql/3273

require __DIR__  . '/../../vendor/autoload.php';

$controller = new Dvd_rental\Controllers\MainController();

//default empty string will show all films
$search_string = '';

if (isset($_POST['submit'])) {
    if ($_POST['search_string']) {
        $search_string = $_POST['search_string'];
    }
}
$controller->search($search_string);
