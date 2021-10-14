<?php \Classes\ClassLayout:: setHead('Cadastro', 'author', 'Página de cadastro') ?>
<?php \Classes\ClassLayout:: setHeader() ?>
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
      <h2>Cadastro de Usuário</h2>
      <p class="lead">Insira seus dados abaixo, para pode se cadastrar na plataforma. </p>
    </div>

    <div class="">
      <div class="">
        <h4 class="mb-3">Insira seus dados!</h4>
        <form class="needs-validation" 
              name='formCadastro' 
              id='formCadastro' 
              action="<?php echo DIRPAGE.'controllers/controllerCadastro'; ?>"
              method="post">
              
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Primeiro nome</label>
              <input type="text" class="form-control" id="firstName" name="nome" placeholder="Primeiro Nome" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Sobrenome</label>
              <input type="text" class="form-control" name="sobrenome" id="lastName" placeholder="Sobrenome" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Senha</label>
              <input type="password" class="form-control"  name="senha" id="senha" placeholder="Senha" value="" required>
              <div class="invalid-feedback">
                Insira sua senha!
              </div>
            </div>

            <div class="col-sm-6">
              <label for="confirmacao" class="form-label">Confirmação da Senha <span class="text-muted"></span></label>
              <input type="password" name="senhaConfi" class="form-control" id="senhaConfi" placeholder="Confirmação da Senha" required>
              <div class="invalid-feedback">
                Confirm sua senha!
              </div>
            </div>
            

            <div class="col-sm-6">
              <label for="email" class="form-label">Email <span class="text-muted"></span></label>
              <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" required>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>
            <div class="col-sm-6">
              <label for="date" class="form-label">Nascimento <span class="text-muted"></span></label>
              <input type="text" name="dataNascimento" class="form-control dataNascimento" id="dataNascimento" placeholder="21/21/2021" required>
              <div class="invalid-feedback">
                Insira sua data de nascimento.
              </div>
            </div>

            
          <hr class="my-4">
          <button class="w-100 btn btn-primary btn-lg" type="submit">Cadastrar</button>
        </form>
      </div>
    </div>
    <div class="caixalimpa text-center" id="caixalimpa">
    </div>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017–2021 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>
<?php \Classes\ClassLayout:: setFooter() ?>