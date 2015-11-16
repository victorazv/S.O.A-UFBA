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

<div class="container">	
	
	<form>
	
		<div style="margin:20px;">
			<center>
				<a href="index.php"> <button type="button" class="btn btn-default btn-sm">Voltar <i class="material-icons">backspace</i></button> </a>
				
				<button id="incluir" class="btn waves-effect waves-light" type="button" onclick="inserePessoa();">Incluir<i class="material-icons right">send</i></button>
				
			</center>
		</div>

		<h5 style="text-align:center;">Cadastro de pessoa</h5>	

	    <input type="hidden" id="id" name="id">
		
		<label>Nome</label>
	    <input type="text" class="form-control" id="nome" name="nome" required>
	   	
	   	<label>Matrícula</label>
	   	<input type="text" class="form-control" id="matricula" name="matricula" required>

	    <label>CPF</label>
	   	<input type="text" class="form-control" id="cpf" name="cpf" required>

	   	<label>Tipo, A=Aluno, P=Profesor</label>
	   	<input type="text" class="form-control" id="tipo" name="tipo" required>

	   	<label>E-mail</label>
	   	<input type="text" class="form-control" id="email" name="email" required>
		
	</form>

</div>

<?php include("rodape.php"); ?>