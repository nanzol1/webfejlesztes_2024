<?php

namespace App\Controllers;
use App\Models\Admin_model;
use App\Models\Menu_model;
use App\Models\Register_model;

class Admin extends BaseController{

    public function index(){
        $userModel = new Register_model();
        $adminModel = new Admin_model();
        if($this->request->getMethod() == "POST"){
            $admin = $adminModel->getAdminById(session()->get('user_id'));
            $user = $userModel->getUserByEmail(session()->get('email'));
            $data['user'] = $user;
            $data['admin'] = $admin;
            $admins = $adminModel->getAdmins();
            $data['admins'] = $admins;
            $users = $userModel->getAllUser();
            $data['users'] = $users;
    
            $username = $this->request->getPost('admin_username');
            $password = $this->request->getPost('admin_password');

    
            if($username == session()->get('email') && password_verify($password, $admin['password']) && !session()->get('isAdminLoggedIn')){
                session()->set('isAdminLoggedIn', true);
            }

    
        }else{
            $admins = $adminModel->getAdmins();
            $data['admins'] = $admins;
            $users = $userModel->getAllUser();
            $data['users'] = $users;
        }


        return view('templates/header').view('user/admin',$data).view('templates/footer');
    }

    public function logoutAdmin(){
        if(session()->get('isAdminLoggedIn')){
            session()->set('isAdminLoggedIn',false);
            if(!session()->get('isAdminLoggedIn')){
                return redirect()->to(base_url('admin'))->with('error','Először jelentkezz be a rendes fiókodba!');
            }
        }else{
            return redirect()->to(base_url('admin'));
        }
    }

    public function createMenu(){
        $menuModel = new Menu_model();
        if($this->request->getMethod() == "POST"){
            $menu_name = $this->request->getPost('menu_name');
            $menu_url = $this->request->getPost('menu_url');
            if($menu_name && $menu_url){
                $menus = [
                    'name'=>$menu_name,
                    'url' => $menu_url,
                ];
                if($menuModel->createMenu($menus)){
                    return redirect()->to('/admin')->with('success','Sikeres menü létrehozás');
                }else{
                    return redirect()->to('/admin')->with('error','Sikertelen menü létrehozás');
                }
            }
        }
    }

    public function createAdmin(){
        $adminModel = new Admin_model();
        $registerModel = new Register_model();
        if($this->request->getMethod() == "POST"){
            $password = $this->request->getPost('create_password');
            $admin_datas = list($admin_id,$admin_email) = explode(',',$this->request->getPost('admin_data'));
            $admin_email = $admin_datas[1];
            $admin_id = $admin_datas[0];
            $admin = [
                'password' => password_hash($password,PASSWORD_DEFAULT),
                'created_by' => session()->get('email'),
                'userId' => $admin_id,
                'admin_email' => $admin_email,
            ];
            if($password){
                 if($adminModel->createAdmin($admin)){
                    if($registerModel->updateUser($admin_id,['admin' => 1])){
                        return redirect()->to('/admin')->with('success','Sikeres létrehozás');
                    }
                 }else{
                    return redirect()->to('/admin')->with('error','Sikertelen létrehozás!');
                 }
            }
        }
    }

    public function deleteUser($userId){
        $adminModel = new Admin_model();
        $userModel = new Register_model();
        $users = $userModel->getAllUser();

        if($userModel->deleteUser($userId)){
            return $this->response->setJSON(['status' => 'success', 'message' => 'A rekord sikeresen törölve lett.']);
        }else{
            return redirect()->to('/admin')->with('error','Sikertelen törlés');
        }
    }

    public function deleteMenu($menuId){
        $menuModel = new Menu_model();
        var_dump($menuId);
        if($menuModel->deleteMenu($menuId)){
            return $this->response->setJSON(['status' => 'success', 'message' => 'A rekord sikeresen törölve lett.']);
        }else{
            return redirect()->to('/admin')->with('error','Sikertelen törlés');
        }
    }
}

?>