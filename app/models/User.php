<?php

namespace App\Models;

use app\config\Database;

class User extends Model
{
    protected $email;
    protected $role;
    protected $password;


    public function __construct($name, $email, $role, $password){
        $this->name = $name;
        $this->email = $email;
        $this->role = $role;
        $this->password = $password;
    }

    public function getEmail(){
        return $this->email;
    }

    public function add()
    {
        $sql = "INSERT INTO users (name, email, pass, role, created_at) VALUES (:name, :email, :pass,  :role, :created_at)";
        $arg = ['name' => $this->name, 'email' => $this->email, 'role'=>$this->role, 'pass' => md5($this->password)];
        Database::insert($sql, $arg);
    }

    public function login($email, $pass)
    {
        $sql = "SELECT id, name, email, pass FROM users WHERE email = :email";
        $arg = ['email' => $email];
        $passHash = md5($pass);
        $user = Database::getRow($sql, $arg);

        if ($user){
            if ($user['user_email'] == $email){
                if ($user['user_password'] == $passHash){
                    $this->id = $user['user_id'];
                    $this->name = $user['user_name'];
                    $this->email = $user['user_email'];
                    $this->role = $user['role'];
                    return true;
                }
            }
        }
        return false;
    }

    public static function getAllUsers(){
        $sql = "SELECT * FROM users";
        return Database::getRows($sql);
    }
}
