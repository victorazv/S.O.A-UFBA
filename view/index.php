<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">

	<title>Login</title>

</head>

<body style="background-color:#F5F5F5">
    	<?php 
    		if (isset($_GET['email'])) {
    			echo"<h6 style='text-align:center; color:#c0392b;'>E-mail ou senha incorreta.</h6>";
			 }
    	?>
    	
    <main style="margin-top:5%;">
      <div class="row">
        <div class="col s12 m8 l4 offset-m2 offset-l4" >
          <div class="card-container col s12  grey lighten-5 z-depth-3">
          <h5 style="text-align:center;">Bem-vindo!</h5>   
            <form action="../controller/verifica_login.php" method="post">
              <div class="row" >
                <div class="input-field col s12">
                  <i class="mdi-action-account-circle prefix"></i>
                  <input placeholder="E-mail" id="email" type="text" name="email" class="validate ">
                  <label>E-mail</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <i class="mdi-action-lock-outline prefix"></i>
                  <input placeholder="Senha" id="senha" type="password" name="senha" class="validate">
                  <label for="senha">Senha</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input type="checkbox" id="lembrar" />
                  <label for="lembrar">Lembrar usuário</label>
                </div>
              </div>
              <div class="row">
                <div class="col s12">
                  <button class="btn waves-effect waves-light col s12"type="submit">Login</button>
                </div>
              </div>
              <div class="row">
                <div class="divider"></div>
                <div class="col s6">
                  <a href="#" class="">Esqueci a senha</a>
                </div>
                <div class="col s6 right-align">
                  <a href="form_pessoa.php" class="">Registrar-se</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
</body>

</html>