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
        $sql = "INSERT INTO users (user_name, user_email, user_role, user_password, date_reg) VALUES (:name, :email, :role, :password, :date_reg)";
        $arg = ['name' => $this->name, 'email' => $this->email, 'role'=>$this->role, 'password' => md5($this->password), 'date_reg' => date('Y-m-d H:i:s')];
        Database::insert($sql, $arg);
    }

    public function login($email, $pass)
    {
        $sql = "SELECT user_id, user_name, user_email, user_password FROM users WHERE user_email = :email";
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
