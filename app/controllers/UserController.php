<?php


namespace App\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function getUsers(){
        return json_encode(User::getAllUsers());
    }
}
