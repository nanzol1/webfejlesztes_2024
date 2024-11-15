<?php

namespace App\Models;

use CodeIgniter\Model;

class Menu_model extends Model{
    protected $table = "menu";
    protected $allowedFields = ['name','url'];
    public function createMenu($data){
        return $this->insert($data);
    }

    public function getMenus(){
        return $this->findAll();
    }

    public function deleteMenu($menuId){
        return $this->delete($menuId);
    }
}
?>