<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoloader.php');

use App\Request\Request;
use Routes\Router;

$request = new Request();
$method = $_SERVER['REQUEST_METHOD'];

(new Router($method, $request))->route();
