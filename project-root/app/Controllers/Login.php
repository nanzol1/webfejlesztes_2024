<?php

namespace App\Controllers;
use App\Models\Register_model;

class Login extends BaseController{
    public function index(){
        $userModel = new Register_model();

        if ($this->request->getMethod() == "POST"){
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');


            $user = $userModel->getUserByEmail($email);

            if($user && password_verify($password,$user['password'])){
                $this->setUserSession($user);

                return redirect()->to(base_url('/profile'));
            }else{
                return redirect()->to(base_url('/login'));

            }
        }

        return view('templates/header').view('user/login').view('templates/footer');
    }

    private function setUserSession($user){
        $data = [
            'user_id' => $user['id'],
            'email' => $user['email'],
            'isLoggedIn' => true,
            'admin' => $user['admin'],
            'isAdminLoggedIn' => false,
        ];

        session()->set($data);
        return true;
    }

    public function logOut(){
        session()->destroy();

        return redirect()->to(base_url());
    }
}

?>