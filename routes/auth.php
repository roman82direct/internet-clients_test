<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoloader.php');

use App\Models\User;
use App\Request\Request;

$request = new Request();
$method = $_SERVER['REQUEST_METHOD'];
$user = new User();

if ($method == 'POST' && $request -> action == 'signin') {
    $result = $user->new(strip_tags($request->name),
                        strip_tags($request->email),
                        strip_tags($request->pass));

    session_start();
    $_SESSION['user_id'] = $result;

    header("Location: ../public/dashboard.php");
}

if ($method == 'POST' && $request->action == 'login') {
    $result = $user->login(strip_tags($request->email), strip_tags($request->pass));
    if ($result){
        session_start();
        $_SESSION['user_id'] = $result['id'];
        header("Location: ../public/dashboard.php");
    } else echo 'Auth Error';
}

    if ($method == 'GET' && $request->action == 'logout'){
        session_start();
        unset($_SESSION['user_id']);
        session_destroy();
        header("Location: ../public/index.php");
}

