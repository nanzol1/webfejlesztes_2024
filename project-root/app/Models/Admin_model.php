<?php

namespace App\Models;
use CodeIgniter\Model;

class Admin_model extends Model{

    protected $DBName = "webfejlesztes";
    protected $table = "admin";
    protected $allowedFields  = ['password','created_by','userId','admin_email'];

    public function createAdmin($data = []){
        return $this->insert($data);
    }

    public function getAdminById($userId){
        return $this->where('userId',$userId)->first();
    }

    public function getAdmins(){
        return $this->findAll();
    }
}

?>