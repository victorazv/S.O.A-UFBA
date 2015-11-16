<!DOCTYPE html>
<html>
<head>
	
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
	<title>Dash</title>

</head>
<body>

    <main style="margin-top:1%;">
      <div class="row">
        <div class="col s12 m8 l4 offset-m2 offset-l4" >
          <div class="card-container col s12  grey lighten-5 z-depth-3">
          <h5 style="text-align:center;">Cadastro de pessoa</h5>   
            <form action="../controller/verifica_login.php" method="post">
              <div class="row" >
                <div class="input-field col s12">
		   			<input type="hidden" id="id" name="id">
		   			<input type="text" class="form-control" id="nome" name="nome" required>
	    			<label>Nome</label>
              	</div>
              </div>
              <div class="row">
                <div class="input-field col s12">
	   				<input type="text" class="form-control" id="matricula" name="matricula" required>
	   				<label>Matrícula</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  	<label>CPF</label>
	   				<input type="text" class="form-control" id="cpf" name="cpf" required>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <select id="tipo" required>
                    <option value="" disabled selected>Selecione</option>
                    <option value="A">Aluno</option>
                    <option value="P">Professor</option>
                  </select>
                <label>Tipo</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
        			<label>E-mail</label>
	   				<input type="email" class="form-control" id="email" name="email" required>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
              <label>Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" required>
                </div>
              </div>
              <div class="row">
                <div class="col s12">
					<center>
						<a href="index.php"> <button type="button" class="btn btn-default btn-sm">Voltar <i class="material-icons">backspace</i></button> </a>
						<button id="incluir" class="btn waves-effect waves-light" type="button" onclick="inserePessoa();">Incluir<i class="material-icons right">send</i></button>
                	</center>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </main>

<?php include("rodape.php"); ?>