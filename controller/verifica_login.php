<?php 

verifica($_POST['email'], $_POST['senha']);

function verifica($email, $senha){
	//ver o extends
	include("../dao/conexao.php");
	$link = new conexao();
	$conexao = $link->conecta();

	$sql = "SELECT id FROM pessoa WHERE email = '".$email."' AND senha = '".$senha."'";
	$query = $conexao->prepare($sql);
	$query->execute();
	$retorno = $query->fetchAll(PDO::FETCH_ASSOC);
		
	if (isset($retorno[0])) {
		session_start();
		$_SESSION["email"] = $email;
		header("Location: ../view/dash.php");
	}else{
		header("Location: ../view/index.php?email=".$email);
	}
	$conexao = $link->desconecta($conexao);
}

?>