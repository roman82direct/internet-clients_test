<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoloader.php');

use App\Controllers\MainCategoryController;
use App\Controllers\SecondCategoryController;
use App\Controllers\GoodController;
use App\Request\Request;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'main') {
    $request = new Request();
    (new MainCategoryController())->create($request);

    header("Location: ../public/dashboard.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'second') {
    $request = new Request();
    (new SecondCategoryController())->create($request);

    header("Location: ../public/dashboard.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'good') {
    $request = new Request();
   (new GoodController())->create($request);

   header("Location: ../public/dashboard.php");
}
