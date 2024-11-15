<?php

use App\Models\Register_model;

if(!function_exists('isUserLoggedIn')){
    function isUserLoggedIn(){
        if(!session()->get('isLoggedIn')){
            return false;
        }else{
            return true;
        }
    }
}

if(!function_exists('isUserAdmin')){
    function isUserAdmin(){
        if(isUserLoggedIn()){
            $registrModel = new Register_model();
            $user = $registrModel->getUserByEmail(session()->get('email'));
            if($user){
                if($user['admin'] == '1'){
                    return true;
                }else{
                    return false;
                }
            }
        }
        return false;
    }
}

if(!function_exists('isUserAdminLoggedIn')){
    function isUserAdminLoggedIn(){
        if(session()->get('admin') == '1' && $_SESSION['isAdminLoggedIn']){
            return true;
        }
        else{
            return false;
        }
    }
}

if(!function_exists('getSessionDatas')){
    function getSessionDatas(){
        log_message('debug', 'Session adatok: ' . json_encode(session()->get()));

        $data = [
            'admin' => session()->get('isAdminLoggedIn'),
        ];

        log_message('debug', 'isAdminLoggedIn: ' . json_encode($data['admin']));

        return $data['admin'];
    }
}

?>