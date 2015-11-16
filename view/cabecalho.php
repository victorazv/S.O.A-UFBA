<?php 
	session_start();
  	if(!$_SESSION['tipo']){
    	header('Location: index.php');
	}

?>

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

<nav>
    
    <div class="nav-wrapper blue darken-4">
    <img src="../img/logo.png">
      <a href="#!" class="brand-logo">Orientação acadêmica - UFBA</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <!-- Menu do topo -->
      <ul class="right hide-on-med-and-down">
        
        <?php 
          if ($_SESSION['tipo'] == "P"){ ?>
            <li><a href="solicitacao_filtro.php">Solicitações</a></li>
            <li><a href="relatorio_solicitacao_filtro.php">Relatório</a></li>
            <li><a href="pessoa.php">Pessoas</a></li>
          <?php
          }else{ ?>
            <li><a href="solicitacao.php">Solicitações</a></li>
          <?php }
        ?>
        <li><a href="index.php">Sair</a></li>
      </ul>
      <!-- Menu lateral -->
      <ul class="side-nav" id="mobile-demo">
        <?php 
          if ($_SESSION['tipo'] == "P"){ ?>
            <li><a href="solicitacao_filtro.php">Solicitações</a></li>
            <li><a href="relatorio_solicitacao_filtro.php">Relatório</a></li>
            <li><a href="pessoa.php">Pessoas</a></li>
          <?php
          }else{ ?>
            <li><a href="solicitacao.php">Solicitações</a></li>
          <?php }
        ?>
        <li><a href="index.php">Sair</a></li>
      </ul>
    </div>
</nav>