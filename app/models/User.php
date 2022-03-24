<?php

namespace App\Models;

use app\config\Database;
use Exception;

class User extends Model
{
    private const SALT ="123";

    protected $role;


    public function new($name, $email, $pass)
    {
        $sql = "INSERT INTO users (name, email, pass) VALUES (:name, :email, :pass)";
        $arg = ['name' => $name, 'email' => $email, 'pass' => md5($pass).self::SALT];
        try {
            $res = Database::insert($sql, $arg);
        }
        catch (Exception $exception){
            $res = $exception->getMessage();
        }
        return $res;
    }

    public function login($email, $pass)
    {
        $sql = "SELECT id, name, email, pass, role FROM users WHERE email = :email";
        $arg = ['email' => $email];
        $passHash = md5($pass).self::SALT;

        $user = Database::getRow($sql, $arg);

        if ($user){
            if ($user['email'] == $email){
                if ($user['pass'] == $passHash){
                    $this->id = $user['id'];
                    $this->name = $user['name'];
                    $this->email = $user['email'];
                    $this->role = $user['role'];
                    return $user;
                }
            }
        }
        return false;
    }

    public static function getAllUsers(){
        $sql = "SELECT * FROM users";
        return Database::getRows($sql);
    }

    public function getUser($id){
        $sql = "SELECT * FROM users WHERE id = $id";
        return Database::getRow($sql);
    }

    public function hasRole($role){
        return $this->role == $role;
    }
}