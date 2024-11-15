<?php

use App\Models\Menu_model;

if(!function_exists('getMenus')){
    function getMenus(){
        $menuModel = new Menu_model();
        return $menuModel->getMenus();
    }
}

if(!function_exists('getCurrentRoute')){
    function getCurrentRoute(){
        $router = \CodeIgniter\Config\Services::router();
        $route_name = $router->getMatchedRoute();
        return $route_name;
    }
}

?>