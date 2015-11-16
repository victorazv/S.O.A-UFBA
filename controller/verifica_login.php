<?php 

verifica($_POST['matricula'], $_POST['senha']);

function verifica($matricula, $senha){
	//ver o extends
	include("../dao/conexao.php");
	$link = new conexao();
	$conexao = $link->conecta();

	$sql = "SELECT id, tipo FROM pessoa WHERE matricula = '".$matricula."' AND senha = '".$senha."'";
	$query = $conexao->prepare($sql);
	$query->execute();
	$retorno = $query->fetchAll(PDO::FETCH_ASSOC);
	
	session_start();		
	
	if (isset($retorno[0])) {
		$_SESSION["matricula"] = $matricula;
		$_SESSION["id_pessoa"] = $retorno[0]['id'];
		$_SESSION["tipo"] = $retorno[0]['tipo'];
		header("Location: ../view/dash.php");
	}else{
		header("Location: ../view/index.php?matricula=".$matricula);
	}
	$conexao = $link->desconecta($conexao);
}

?>