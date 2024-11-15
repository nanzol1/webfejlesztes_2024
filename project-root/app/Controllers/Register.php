<?php
    namespace App\Controllers;
    use App\Models\Register_model;
    use CodeIgniter\I18n\Time;

    class Register extends BaseController{
        public function index(){
            return $this->regUser();
        }

        public function loadPage($page,$data){
            return view('templates/header').view($page,$data).view('templates/footer');
        }

    public function regUser(){
        $regModel = new Register_model();
        $formData = [];
        $sameData = [];
        $isDuplicate = false;
        if($this->request->getMethod() == "POST"){
            $first_name = $this->request->getPost('first_name');
            $last_name = $this->request->getPost('last_name');
            $username = $this->request->getPost("username");
            $email = $this->request->getPost("email");
            $password = $this->request->getPost("password");
            $now = Time::now('Europe/Budapest','hu_HU');
            $users = $regModel->getAllUser();
            if(($username && $email)){
                foreach($users as $item){
                    if($username == $item['username']){
                        return redirect()->to(base_url('register'))->with('error','Ez a felhasználónév már foglalt!');
                    }elseif($email == $item['email']){
                        return redirect()->to(base_url('register'))->with('error','Ez az email cím már foglalt!');
                    }
                }
                if((preg_match("/^[a-zA-Z0-9][a-zA-Z0-9]{3,}$/",$username) 
                && preg_match("/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.* ).{8,16}$/",$password)) 
                && !$isDuplicate){
                    $formData = [
                        'username' => $username,
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'email' => $email,
                        'password' => password_hash($password,PASSWORD_DEFAULT),
                        'created' => $now->toDateString(),
                    ];
    
                    if($regModel->createUser($formData)){
                        return redirect()->to(base_url('register'));
                    }else{
                        return redirect()->to(base_url('register'))->with('error','Hiba történt a regisztráció során!');
                    }
                }else{
                    return redirect()->to(base_url('register'))->with('error','Hiba történt a regisztráció során!');
                }
            }else{
                $formData = [];
                return redirect()->to(base_url('register'))->with('error','Hiba történt a regisztráció során!');
            }
        }
        return $this->loadPage('user/register',$formData);
    }
    }
?>