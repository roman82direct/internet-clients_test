<?php


namespace App\Controllers\Auth;


use App\Models\User;

class Auth
{

    public function register(User $user)
    {
        $user->add();
        $data = ['name' => $user->getName(), 'email' => $user->getEmail()];
        return json_encode($data);
    }

    public function login(User $user)
    {
        if ($user->login($_POST['userEmail'], $_POST['userPass'])) {
            $data = ['user_id' => $user->getId(), 'name' => $user->getName(), 'email' => $user->getEmail(), 'status'=> 200];
            return json_encode($data);
        } else {
            $data['status'] = 401;
//            return http_redirect('back', []);
            return json_encode($data);
        }
    }
}
