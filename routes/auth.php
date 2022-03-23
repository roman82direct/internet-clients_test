<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoloader.php');


use App\Models\User;
use App\Controllers\Auth\Auth;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'register'){
    $user = new User($_POST['userName'], $_POST['userEmail'], $_POST['userRole'], $_POST['userPass']);
    echo(new Auth())->register($user);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'login'){
    $user = new User($_POST['userName'], $_POST['userEmail'], $_POST['userRole'], $_POST['userPass']);
    echo(new Auth())->login($user);
}
