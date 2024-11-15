<?php

namespace App\Controllers;
use App\Models\Menu_model;

class Pages extends BaseController{
    public function index(): string{
        return view('templates/header').view('welcome_message').view('templates/footer');
    }

}

?>