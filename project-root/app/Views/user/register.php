<main class="main-content  mt-0">
    <section class="min-vh-100 mb-8">
      <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('assets/img/curved-images/curved14.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
      </div>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
              <div class="card-header text-center pt-4">
                <h5>Regisztráció</h5>
              </div>
              <div class="card-body">
                <form action="regUser" method="POST" id="reglog_form" role="form text-left" class="needs-validation" novalidate>
                  <?php if(session('error')):?>
                    <?=session('error')?>
                    <?php endif;?>
                  <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Vezetéknév" name="first_name" aria-label="Name" aria-describedby="username-addon">
                    </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Keresztnév" name="last_name" aria-label="Name" aria-describedby="username-addon">
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" id="validationCustom01" placeholder="Felhasználónév" name="username" aria-label="Name" aria-describedby="username-addon">
                    <label for="validationCustom01" id="warning-label" class="warning-label"></label>  
                  </div>
                  <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" id="validationCustom03" aria-label="Email" aria-describedby="email-addon">
                    <label for="validationCustom03" id="warning-label-email" class="warning-label"></label>  
                  </div>
                  <div class="mb-3">
                    <input type="password" id="validationCustom04" class="form-control" placeholder="Password" name="password" aria-label="Password" aria-describedby="password-addon">
                    <label for="validationCustom04" id="warning-label-password" class="warning-label"></label>  
                  </div>
                  <div class="mb-3">
                    <input type="password" id="validationCustom05" class="form-control" placeholder="Password 2x" name="password2" aria-label="Password" aria-describedby="password-addon">
                    <label for="validationCustom05" id="warning-label-password2" class="warning-label"></label>  
                  </div>
                  <div class="form-check form-check-info text-left">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                      Elfogadom a <a href="javascript:;" class="text-dark font-weight-bolder">Általános Szerződési Feltételeket</a>
                    </label>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Regisztrálok</button>
                  </div>
                  <p class="text-sm mt-3 mb-0">Már van felhasználód?<a href="<?=base_url('login')?>" class="text-dark font-weight-bolder">Jelentkezz be</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
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
            logreg_form.addEventListener('submit',(e) =>{
                e.preventDefault();
                let valid = true;
                if(username.value.length <= 0){
                    document.getElementById('warning-label').innerHTML = "A mező kitöltése kötelező!";
                    valid = false;
                    username.classList.add('is-invalid');
                }else{
                    document.getElementById('warning-label').innerHTML = "";
                    if(!username.value.match(userRegExp)){
                        document.getElementById('warning-label').innerHTML = "Nem megfelelő a felhasználónév formátuma!";
                        valid = false;
                    username.classList.add('is-invalid');

                    }
                }
                if(password.value.length <= 0){
                    document.getElementById('warning-label-password').innerHTML = "A mező kitöltése kötelező!";
                    valid = false;
                    password.classList.add('is-invalid');
                }else{
                    document.getElementById('warning-label-password').innerHTML = "";
                    if(!password.value.match(regExp)){
                        document.getElementById('warning-label-password').innerHTML = "Nem megfelelő a jelszó formátuma!";
                        valid = false;
                        password.classList.add('is-invalid');
                    }
                }
                if(password2.value.length <= 0){
                    document.getElementById('warning-label-password2').innerHTML = "A mező kitöltése kötelező!";
                    valid = false;
                    password2.classList.add('is-invalid');
                }else{
                    document.getElementById('warning-label-password2').innerHTML = "";
                    if(!password2.value.match(regExp)){
                        document.getElementById('warning-label-password2').innerHTML = "Nem megfelelő a jelszó formátuma!";
                        valid = false;
                        password2.classList.add('is-invalid');
                    }
                }
                if(email.value.length <= 0){
                    document.getElementById('warning-label-email').innerHTML = "A mező kitöltése kötelező!";
                    valid = false;
                    email.classList.add('is-invalid');
                }else{
                    document.getElementById('warning-label-email').innerHTML = "";
                    if(!email.value.match(emailExp)){
                        document.getElementById('warning-label-email').innerHTML = "Nem megfelelő az email formátuma!";
                        valid = false;
                        email.classList.add('is-invalid');
                        
                    }
                }
                if(password2.value != password.value){
                    passwrd2.innerHTML = "A két jelszó nem egyezik egymással!";
                    valid = false;
                    password2.classList.add('is-invalid');
                }
               if(valid){
                logreg_form.submit();
               }else{
                let elements = document.getElementsByClassName('warning-label');
                for (let i = 0; i < elements.length; i++) {
                    elements[i].style.display = "inline-block";
                }
               }
            });
        });
    });
</script>