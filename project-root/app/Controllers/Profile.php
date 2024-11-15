<?php

namespace App\Controllers;

use App\Models\Register_model;

class Profile extends BaseController{

    public function index(){
        return $this->getProfileDatas();
    }

    public function getProfileDatas(){
        if(isUserLoggedIn()){
            $user = [
                'email' => session()->get('email'),
            ];
            $userModel = new Register_model();
            $data['register_date'] = $userModel->getUserByEmail($user['email'])['created'];
            $data['first_name'] = $userModel->getUserByEmail($user['email'])['first_name'];
            $data['last_name'] = $userModel->getUserByEmail($user['email'])['last_name'];
            $data['username'] = $userModel->getUserByEmail($user['email'])['username'];
            $data['user'] = $user;
            return $this->loadPage("user/profile",$data);
        }
        return $this->response->setStatusCode(404)->setBody("Az oldalhoz nincs hozzáférésed!");
    }

    public function updateUser(){
        $userModel = new Register_model();
        $Ischanged = false;
        if($this->request->getMethod() === "POST"){
            $userDatas = session()->get();
            $modelDatas = $userModel->getUserByEmail($userDatas['email']);
            $username = $this->request->getPost('username');
            $first_name = $this->request->getPost('first_name');
            $last_name = $this->request->getPost('last_name');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            if($first_name){
                $userModel->updateUser($userDatas['user_id'],['first_name' => $first_name]);
                $Ischanged = true;
            }
            if($last_name){
                $userModel->updateUser($userDatas['user_id'],['last_name' => $last_name]);
                $Ischanged = true;
            }
            if($username != $userModel->getUserByEmail($userDatas['email'])['username']){
                session()->set('username',$username);
                $userModel->updateUser($userDatas['user_id'],['username' => $username]);
                $Ischanged = true;
            }
            if($email != $userDatas['email']){
                session()->set('email',$email);
                $userModel->updateUser($userDatas['user_id'],['email' => $email]);
                $Ischanged = true;
            }
            if($password != password_verify($password,$modelDatas['password'])){
                if(password_verify($password,$modelDatas['password'])){
                    redirect()->to(base_url('profile'))->with('error','A jelszó nem egyezhet meg az előzővel!'); 
                }else{
                    $userModel->updateUser($userDatas['user_id'],['password' => password_hash($password,PASSWORD_DEFAULT)]);
                    $Ischanged = true;
                }
            }
            if($Ischanged){
                return redirect()->to(base_url('profile'))->with('success','Sikeresen adat változtatás');
            }else{
                return redirect()->to(base_url('profile'));
            }
        }
    }

    public function loadPage($page,$data = []){
        return view("templates/header").view($page,$data).view("templates/footer");
    }
}
?>