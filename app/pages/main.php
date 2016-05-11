<?php
//Search taken from here:
//http://mrbool.com/how-to-create-your-own-search-engine-with-php-and-mysql/3273

require __DIR__  . '/../../vendor/autoload.php';

$controller = new Dvd_rental\Controllers\MainController();

if (isset($_POST['submit'])) {
    //if search string typed in, search dammit
    if ($_POST['search_string']) {
        $search_string = $_POST['search_string'];
        $controller->search($search_string);
    }
} else if (isset($_GET['id'])) {
    //view films by category, id is passed into url
    $category_id = $_GET['id'];
    $controller->sortByCategory($category_id);
} else {
    //default empty string will show all films
    $search_string = '';
    $controller->search($search_string);
}
