<style>
  section{
    flex: 1;
  }
</style>
<?php if(!isUserAdminLoggedIn()):?>
<section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Admin felület</h3>
                </div>
                <div class="card-body">
                  <form role="form" action="<?=base_url('/admin')?>" method="POST" class="admin_form">
                    <label>Email</label>
                    <div class="mb-3">
                      <input type="email" class="form-control" placeholder="E-mail" name="admin_username" id="admin_username" aria-label="Email" aria-describedby="email-addon">
                    </div>
                    <label>Password</label>
                    <div class="mb-3">
                      <input type="password" class="form-control" id="admin_password" name="admin_password" placeholder="Jelszó" aria-label="Password" aria-describedby="password-addon">
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Bejelentkezés</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('assets/img/curved-images/curved6.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>
<?php endif;?>
<?php if(isUserAdminLoggedIn()):?>
<section>  <main class="main-content position-relative h-100 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-4 col-12 mt-4">
          <div class="row">
            <div class="col-lg-12 col-md-6 col-12">
              <div class="card">
                <span class="mask bg-primary opacity-10 border-radius-lg"></span>
                <div class="card-body p-3 position-relative">
                  <div class="row">
                    <div class="col-12 text-start">
                      <div class="icon icon-shape bg-white shadow text-center border-radius-2xl">
                      <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                      </div>
                      <h5 class="text-white font-weight-bolder mb-0 mt-3">
                        <?=count($users)?>
                      </h5>
                      <span class="text-white text-sm">Regisztrált felhasználók</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-6 col-12 mt-4">
              <div class="card">
                <span class="mask bg-primary opacity-10 border-radius-lg"></span>
                <div class="card-body p-3 position-relative">
                  <div class="row">
                    <div class="col-8 text-start">
                      <div class="icon icon-shape bg-white shadow text-center border-radius-2xl">
                      <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 6H20M4 12H20M4 18H20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                      </div>
                      <h5 class="text-white font-weight-bolder mb-0 mt-3">
                        <?php $menu = getMenus();?>
                        <?=count($menu)?>
                      </h5>
                      <span class="text-white text-sm">Létrehozott menük</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12 mt-4">
              <div class="card">
                <span class="mask bg-dark opacity-10 border-radius-lg"></span>
                <div class="card-body p-3 position-relative">
                  <div class="row">
                    <div class="col-8 text-start">
                        <h5 class="text-white font-weight-bolder mb-3 mt-3">Menü létrehozás</h5>
                        <form action="<?=base_url('/admin/createMenu')?>" method="POST" class="admin_form">
                            <label for="menu_name" class="text-white text-sm">Menü Név</label>
                            <div class="col-12">
                                <input type="text" name="menu_name" id="menu_name">
                            </div>
                            <label for="menu_url" class="text-white text-sm">Menü URL</label>
                            <div class="col-12">
                                <input type="text" name="menu_url" id="menu_url">
                            </div>
                            <div class="col-12 col-lg-6">
                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Létrehozás</button>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12 mt-4">
            <div class="card">
                <span class="mask bg-dark opacity-10 border-radius-lg"></span>
                <div class="card-body p-3 position-relative">
                  <div class="row">
                    <div class="col-8 text-start">
                        <h5 class="text-white font-weight-bolder mb-3 mt-3">Admin létrehozása</h5>
                        <form action="<?=base_url('/admin/createAdmin')?>" method="POST" class="create_admin">
                            <label for="create_password" class="text-white text-sm">Admin jelszó létrehozása: </label>
                            <div class="col-12">
                                <input type="password" name="create_password" id="create_password" placeholder="Admin jelszó">
                            </div>
                            <div class="col-12 mt-2">
                              <select name="admin_data" id="admins">
                                <?php foreach($users as $potads):?>
                                  <option value="<?=$potads['id']?>,<?=$potads['email']?>"><?=$potads['email']?></option>
                                <?php endforeach;?>
                              </select>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Létrehozás</button>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-md-12 mb-md-0 mb-4 mt-4 md-lg-0">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>Felhasználók</h6>
                  <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                  </p>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Név</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Szerepkör</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Regisztrálási dátum</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Művelet</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($users as $item):?>
                        <tr>
                          <td>
                            <div class="d-flex px-2 py-1">
                              <div>
                                <?php if(isUserAdmin()):?>
                                    <svg fill="#000000" width="32px" height="32px" class="avatar avatar-sm me-3" viewBox="0 0 36 36" version="1.1" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>administrator-solid</title> <circle cx="14.67" cy="8.3" r="6" class="clr-i-solid clr-i-solid-path-1"></circle><path d="M16.44,31.82a2.15,2.15,0,0,1-.38-2.55l.53-1-1.09-.33A2.14,2.14,0,0,1,14,25.84V23.79a2.16,2.16,0,0,1,1.53-2.07l1.09-.33-.52-1a2.17,2.17,0,0,1,.35-2.52,18.92,18.92,0,0,0-2.32-.16A15.58,15.58,0,0,0,2,23.07v7.75a1,1,0,0,0,1,1H16.44Z" class="clr-i-solid clr-i-solid-path-2"></path><path d="M33.7,23.46l-2-.6a6.73,6.73,0,0,0-.58-1.42l1-1.86a.35.35,0,0,0-.07-.43l-1.45-1.46a.38.38,0,0,0-.43-.07l-1.85,1a7.74,7.74,0,0,0-1.43-.6l-.61-2a.38.38,0,0,0-.36-.25H23.84a.38.38,0,0,0-.35.26l-.6,2a6.85,6.85,0,0,0-1.45.61l-1.81-1a.38.38,0,0,0-.44.06l-1.47,1.44a.37.37,0,0,0-.07.44l1,1.82A7.24,7.24,0,0,0,18,22.83l-2,.61a.36.36,0,0,0-.26.35v2.05a.36.36,0,0,0,.26.35l2,.61a7.29,7.29,0,0,0,.6,1.41l-1,1.9a.37.37,0,0,0,.07.44L19.16,32a.38.38,0,0,0,.44.06l1.87-1a7.09,7.09,0,0,0,1.4.57l.6,2.05a.38.38,0,0,0,.36.26h2.05a.38.38,0,0,0,.35-.26l.6-2.05a6.68,6.68,0,0,0,1.38-.57l1.89,1a.38.38,0,0,0,.44-.06L32,30.55a.38.38,0,0,0,.06-.44l-1-1.88a6.92,6.92,0,0,0,.57-1.38l2-.61a.39.39,0,0,0,.27-.35V23.82A.4.4,0,0,0,33.7,23.46Zm-8.83,4.72a3.34,3.34,0,1,1,3.33-3.34A3.34,3.34,0,0,1,24.87,28.18Z" class="clr-i-solid clr-i-solid-path-3"></path> <rect x="0" y="0" width="36" height="36" fill-opacity="0"></rect> </g></svg>  
                                <?php else:?>
                                    <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="avatar avatar-sm me-3"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                <?php endif;?>
                                </div>
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm"><?=$item['first_name']?> <?=$item['last_name']?></h6>
                              </div>
                            </div>
                          </td>
                          <td class="align-middle text-left text-sm">
                            <span class="text-xs font-weight-bold"><?=$item['email']?></span>
                          </td>
                          <td class="align-middle text-left text-sm">
                            <span class="text-xs font-weight-bold"><?=$item['admin'] ? 'Admin' : 'Felhasználó'?></span>
                          </td>
                          <td class="align-middle text-center text-sm">
                            <span class="text-xs font-weight-bold"><?=$item['created']?></span>
                          </td>
                          <td class="align-middle text-center text-sm">
                            <button class="delete-btn btn btn-link text-danger text-gradient px-3 mb-0" data-id="<?=$item['id']?>" id="delete-btn">Törlés</button>
                          </td>
                        </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="card mt-4 md-lg-0">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>Menük</h6>
                  <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                  </p>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Név</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">URL</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Művelet</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($menu as $item):?>
                        <tr>
                          <td>
                            <div class="d-flex px-2 py-1">
                              <div>
                                <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 6H20M4 12H20M4 18H20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                </div>
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm"><?=$item['name']?></h6>
                              </div>
                            </div>
                          </td>
                          <td class="align-middle text-left text-sm">
                            <span class="text-xs font-weight-bold"><?=$item['url']?></span>
                          </td>
                          <td class="align-middle text-center text-sm">
                            <button class="delete-btn btn btn-link text-danger text-gradient px-3 mb-0 deletemenu-btn" data-id="<?=$item['id']?>" id="deletemenu-btn">Törlés</button>
                          </td>
                        </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid">
            <div class="container">
                <div class="col-12">
                    <a href="<?=base_url('admin/logoutAdmin')?>" class="btn bg-gradient-danger w-100 mt-4 mb-0">Admin kijelentkezés</a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </main></section>
<?php endif;?>

<script>
    function docReady(fn) {
        if (document.readyState === "complete" || document.readyState === "interactive") {
            setTimeout(fn, 1);
        } else {
            document.addEventListener("DOMContentLoaded", fn);
        }
    }
    
    docReady(function(){
        let dbutton = document.querySelectorAll(".delete-btn");
        dbutton.forEach(element => {
            element.addEventListener('click', function(){
                let userId = $(this).data('id');

                if(confirm("Biztosan törölni szeretnéd?")){
                    $.ajax({
                        url: '<?=base_url('admin/deleteUser/')?>'+userId,
                        type: 'POST',
                        success: function(response){
                            console.log("response: "+ response.message);
                            location.reload();
                        },
                        error: function(xhr,error,status){
                            console.log(xhr.responseText);
                            console.log('Error: '+error+" "+"Status: "+status);
                        }
                    });
                }
            });
        });
        let dbutton2 = document.querySelectorAll(".deletemenu-btn");
        dbutton2.forEach(element => {
            element.addEventListener('click', function(){
                let menunId = $(this).data('id');

                if(confirm("Biztosan törölni szeretnéd?")){
                    $.ajax({
                        url: '<?=base_url('admin/deleteMenu/')?>'+menunId,
                        type: 'POST',
                        success: function(response){
                            console.log("response: "+ response.message);
                            location.reload();
                        },
                        error: function(xhr,error,status){
                            console.log(xhr.responseText);
                            console.log('Error: '+error+" "+"Status: "+status);
                        }
                    });
                }
            });
        });
    });
</script>