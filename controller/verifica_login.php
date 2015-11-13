<?php 

verifica($_POST['email'], $_POST['senha']);

function verifica($email, $senha){
	//ver o extends
	include("../dao/conexao.php");
	$link = new conexao();
	$conexao = $link->conecta();

	$sql = "SELECT id, tipo FROM pessoa WHERE email = '".$email."' AND senha = '".$senha."'";
	$query = $conexao->prepare($sql);
	$query->execute();
	$retorno = $query->fetchAll(PDO::FETCH_ASSOC);
	
	session_start();		
	
	if (isset($retorno[0])) {
		$_SESSION["email"] = $email;
		$_SESSION["tipo"] = $retorno[0]['tipo'];
		header("Location: ../view/dash.php");
	}else{
		header("Location: ../view/index.php?email=".$email);
	}
	$conexao = $link->desconecta($conexao);
}

?>