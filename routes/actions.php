<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoloader.php');

use App\Request\Request;
use Routes\Router;

$request = new Request();

(new Router($_SERVER['REQUEST_METHOD'], $request))->route();
