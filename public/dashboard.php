<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoloader.php');

use App\Models\User;

$user = (new User()) ->getUser($_SESSION['user_id']);

include_once ('views/layouts/app.php');
