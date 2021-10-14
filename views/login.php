<?php \Classes\ClassLayout:: setHead('Login', 'author', 'Página de Login') ?>
<?php \Classes\ClassLayout:: setHeader() ?>

    
    
    
    
    <div class='row'> 
        <div class='col-sm'></div>
        
        <div class='col-sm text-center'>
            <div class="form-signin">
              <form name="formLogin" 
                    class="formLogin"
                    id="formLogin" 
                    method="POST"
                    action="<?php echo DIRPAGE.'controllers/controllerLogin'?>"
                    >
                <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">Faça login</h1>
            
                <div class="form-floating">
                  <input name="email" type="email" class="form-control" id="email" placeholder="seuemail@google.com">
                  <label for="floatingInput">Email</label>
                </div>
                
                <div class="form-floating">
                  <input name="senha" type="password" class="form-control" id="senha" placeholder="Senha">
                  <label for="floatingPassword">Senha</label>
                </div>
            
                <div class="checkbox mb-3">
                  <label>
                    <input type="checkbox" value="remember-me"> Esqueci a senha.
                  </label>
                </div>
        
                <button class="w-100 btn btn-lg btn-primary" type="submit">Logar</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
              </form>
              <div class="caixalimpa text-center" id="caixalimpa">a
    </div>
            </div>
        </div>
        <div class='col-sm'></div>
    </div>
    
    
        
    



<?php \Classes\ClassLayout:: setFooter() ?>