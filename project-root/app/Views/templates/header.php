<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Webfejlesztés 2024</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css'); ?>">
    <link id="pagestyle" href="<?= base_url('assets/css/').'soft-ui-dashboard.min.css?v=1.1.0'?>" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <?php
    function generateMenus(){
      $menu = getMenus();
      $result = [];
      foreach($menu as $item){
        if(isUserLoggedIn()){
          if($item['name'] != 'Register' && $item['name'] != 'Login'){
            $result[] = $item;
          }
        }else if($item['name'] != 'Profile'){
          $result[] = $item;
        }
      }
      if(isUserLoggedIn()){
        $result[] = ['name' => 'Logout','url' => 'logout'];
      }
      return $result;
    }
  ?>
    <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?=base_url()?>">Webfejlesztés</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php $menu = generateMenus();?>
            <?php foreach($menu as $item):?>
              <li class="nav-item">
                <a class="nav-link <?=getCurrentRoute()[0] == $item['url'] ? 'active' : ''?>" aria-current="page" href="<?=base_url().$item['url']?>"><?=$item['name']?></a>
              </li>
            <?php endforeach;?>
            <?php if(isUserAdmin()):?>
              <a class="nav-link <?=getCurrentRoute()[0] == 'admin' ? 'active' : ''?>" aria-current="page" href="<?=base_url('/admin')?>">Admin</a>
            <?php endif;?>
          </ul>
        </div>
      </div>
    </nav>
    </header>