<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoloader.php');

use App\Controllers\MainCategoryController;
use App\Controllers\SecondCategoryController;
use App\Controllers\GoodController;
use App\Request\Request;


$request = new Request();
$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST' && $request->action == 'main') {
    (new MainCategoryController())->create($request);

    header("Location: ../public/dashboard.php");
}

if ($method == 'POST' && $request->action == 'second') {
    (new SecondCategoryController())->create($request);

    header("Location: ../public/dashboard.php");
}

if ($method == 'POST' && $request->action == 'good') {
    (new GoodController())->create($request);

    header("Location: ../public/dashboard.php");
}

if ($method == 'GET' && $request->action == 'good') {
    (new GoodController())->delete($request);

    header("Location: ../public/dashboard.php");
}

if ($method == 'GET' && $request->action == 'second') {
    (new SecondCategoryController())->delete($request);

    header("Location: ../public/dashboard.php");
}

if ($method == 'GET' && $request->action == 'main') {
    (new MainCategoryController())->delete($request);

    header("Location: ../public/dashboard.php");
}

if ($method == 'POST' && $request->action == 'updatemain') {
    $res = (new MainCategoryController())->put($request);

    header("Location: ../public/dashboard.php");
}

if ($method == 'POST' && $request->action == 'updatesecond') {
    $res = (new SecondCategoryController())->put($request);

    header("Location: ../public/dashboard.php");
}

if ($method == 'POST' && $request->action == 'updategood') {
   $res = (new GoodController())->put($request);

   header("Location: ../public/dashboard.php");
}
