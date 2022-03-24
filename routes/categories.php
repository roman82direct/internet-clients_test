<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoloader.php');

use App\Controllers\MainCategoryController;
use App\Request\Request;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'main') {
    $request = new Request();
//    var_dump($request -> name);
    (new MainCategoryController())->create($request);

    header("Location: ../public/dashboard.php");
}
