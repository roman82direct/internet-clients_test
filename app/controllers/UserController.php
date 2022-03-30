<?php


namespace App\Controllers;

use App\Models\User;

class UserController
{
    public function signIn($data){
        $result = (new User())->new($data);

        if ($result){
            session_start();
            $_SESSION['user_id'] = $result;
        } else echo 'Auth Error';

    }

    public function logIn($data){
        $result = (new User())->login($data);

        if ($result){
            session_start();
            $_SESSION['user_id'] = $result['id'];
        } else echo 'Auth Error';
    }

    public function logOut(){
        session_start();
        unset($_SESSION['user_id']);
        session_destroy();
        header("Location: ../public/index.php");
    }
}
