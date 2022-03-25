<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoloader.php');

use App\Models\User;
use App\Request\Request;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'signin') {
    $user = new User();
    $result = $user->new(strip_tags($_POST['name']),
        strip_tags($_POST['email']),
        strip_tags($_POST['pass']));
    session_start();
    $_SESSION['user_id'] = $result;

    header("Location: ../public/dashboard.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'login') {
    $user = new User();
    $result = $user->login(strip_tags($_POST['email']), strip_tags($_POST['pass']));
    if ($result){
        session_start();
        $_SESSION['user_id'] = $result['id'];
        header("Location: ../public/dashboard.php");
    } else echo 'Auth Error';
}

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['action'] == 'logout'){
        session_start();
        unset($_SESSION['user_id']);
        session_destroy();
        header("Location: ../public/index.php");
}

