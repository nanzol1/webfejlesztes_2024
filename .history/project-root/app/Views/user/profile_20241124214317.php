<style>
    section{
        flex: 1;
    }
</style>
<section>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-4 pb-5">
            <div class="author-card pb-3">
                <div class="author-card-cover"></div>
                <div class="author-card-profile">
                    <div class="author-card-avatar"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Profile picture">
                    </div>
                    <div class="author-card-details">
                        <h5 class="author-card-name text-lg"><?=var_dump($user)?></h5><span class="author-card-position"><?=$register_date ?? 'Regisztráció dátuma'?></span>
                    </div>
                </div>
            </div>
            <div class="wizard">
                <nav class="list-group list-group-flush">
                    <a class="list-group-item active" href="#">
                        <i class="fe-icon-user text-muted"></i>Profilom
                    </a>
                </nav>
            </div>
        </div>
        <div class="col-lg-8 pb-5">
            <?=session('success')?>
            <?=session('error')?>
            <form class="row needs-validation" id="reglog_form" action="<?=base_url('profile/updateUser')?>" method="POST" novalidate>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-fn">Vezetéknév</label>
                        <input class="form-control" type="text" name="first_name" id="account-fn" value="<?=$first_name ?? 'Vezetéknév'?>" placeholder="<?=$first_name ?? 'Vezetéknév'?>" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-fn">Keresztnév</label>
                        <input class="form-control" type="text" name="last_name" id="account-fn" value="<?=$last_name ?? 'Keresztnév'?>" placeholder="<?=$last_name ?? 'Keresztnév'?>" required="">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                    <label for="validationCustom01" id="warning-label" class="warning-label"></label> 
                        <input class="form-control" type="text" name="username" id="validationCustom01" value="<?=$username ?? 'Felhasználónév'?>" placeholder="<?=$username ?? 'Felhasználónév'?>" required="">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="validationCustom03" id="warning-label-email" class="warning-label"></label> 
                        <input class="form-control" type="email" name="email" id="validationCustom03" value="<?=$user['email'] ?? 'E-mail cím'?>" placeholder="<?=$user['email'] ?? 'E-mail cím'?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="password" id="validationCustom04" class="form-control" placeholder="Password" name="password" aria-label="Password" aria-describedby="password-addon">
                        <label for="validationCustom04" id="warning-label-password" class="warning-label"></label>  
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="password" id="validationCustom05" class="form-control" placeholder="Password 2x" name="password2" aria-label="Password" aria-describedby="password-addon">
                        <label for="validationCustom05" id="warning-label-password2" class="warning-label"></label>  
                    </div>
                </div>
                <div class="col-12">
                    <hr class="mt-2 mb-3">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <button class="btn btn-style-1 btn-primary" type="submit" data-toast="" data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">Profil frissítése</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</section>
<script>
    function docReady(fn) {
        if (document.readyState === "complete" || document.readyState === "interactive") {
            setTimeout(fn, 1);
        } else {
            document.addEventListener("DOMContentLoaded", fn);
        }
    }    

    docReady(function(){
        (function () {
          'use strict'

          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.querySelectorAll('.needs-validation');

          // Loop over them and prevent submission
          Array.prototype.slice.call(forms)
            .forEach(function (form) {
              form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                  event.preventDefault()
                  event.stopPropagation()
                }
            
              }, false)
            })
        })()
        addEventListener('DOMContentLoaded', (e) =>{
            e.preventDefault();
            let password = document.getElementById('validationCustom04');
            let password2 = document.getElementById('validationCustom05');
            let email = document.getElementById('validationCustom03');
            let logreg_form =  document.querySelector('#reglog_form');
            let button =document.querySelector('.submit-btn');
            let regExp = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.* ).{8,16}$/;
            let userRegExp = /^[a-zA-Z0-9][a-zA-Z0-9]{3,}$/;
            let username = document.getElementById('validationCustom01');
            let passwrd = document.getElementById('warning-label-password');
            let passwrd2 = document.getElementById('warning-label-password2');
            let inputs = document.querySelectorAll('input');
            let emailExp = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            inputs.forEach(input => {
                input.addEventListener('change', (e) => {
                    const label = document.querySelector(`label[for='${e.target.id}']`);
                    console.log(e.target.id);

                    if (e.target.id === 'validationCustom01') {
                        if (username.value.length < 4) {
                            label.innerText = "A felhasználónév minimum 4 karakter kell legyen!";
                            username.classList.add('is-invalid');
                            label.style.display = 'inline-block';

                        } else if (!username.value.match(userRegExp)) {
                            label.innerText = "A felhasználónév formátuma nem megfelelő!";
                            username.classList.add('is-invalid');
                            label.style.display = 'inline-block';

                        } else {
                            label.innerText = "";
                            username.classList.remove('is-invalid');
                            username.classList.add('is-valid');
                            label.style.display = 'none';
                        }
                    } else if (e.target.id === 'validationCustom03') {
                        if (!email.value.match(emailExp)) {
                            label.innerText = "Az email formátuma nem megfelelő!";
                            email.classList.add('is-invalid');
                            label.style.display = 'inline-block';

                        } else {
                            label.innerText = "";   
                            email.classList.remove('is-invalid');
                            email.classList.add('is-valid');
                            label.style.display = 'none';

                        }
                    } else if (e.target.id === 'validationCustom04') {
                        if (password.value.length > 0 && !password.value.match(regExp)) {
                            label.innerText = "A jelszó formátuma nem megfelelő!";
                            password.classList.add('is-invalid');
                            label.style.display = 'inline-block';

                        } else {
                            label.innerText = "";
                            password.classList.remove('is-invalid');
                            password.classList.add('is-valid');
                            label.style.display = 'none';

                        }
                    } else if (e.target.id === 'validationCustom05') {
                        if (password2.value.length > 0 && !password2.value.match(regExp)) {
                            label.innerText = "A jelszó formátuma nem megfelelő!";
                            password2.classList.add('is-invalid');
                            label.style.display = 'inline-block';
                        } else {
                            label.innerText = "";
                            password2.classList.remove('is-invalid');
                            password2.classList.add('is-valid');
                            label.style.display = 'none';
                        }
                    }
                });
            });
        });
    });
</script>