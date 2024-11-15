<?php

namespace App\Models;
use CodeIgniter\Model;

class Register_model extends Model {

    protected $DBName = "webfejlesztes";
    protected $table = "user";
    protected $allowedFields  = ['first_name','last_name','username','email','password','created','admin'];

    public function createUser($data){
        return $this->insert($data);
    }

    public function getUserByEmail($email){
        return $this->where('email',$email)->first();
    }

    public function updateUser($userId,$data = []){
        return $this->where('id',$userId)->set($data)->update();
    }
    public function getAllUser(){
        return $this->findAll();
    }
    
    public function deleteUser($userId){
        return $this->delete($userId);
    }
}

?>