<?php 

if (isset($_GET['operacao'])) {

	include("conexao.php");
	$link = new conexao();
	$conexao = $link->conecta();

	if ($_GET['operacao'] == "insert") {
		
		$sql = "INSERT INTO `pessoa` (`nome`, `matricula`, `cpf`, `tipo`, `email`, `senha`) 
		VALUE ('".$_POST['nome']."', '".$_POST['matricula']."', '".$_POST['cpf']."', '".$_POST['tipo']."', '".$_POST['email']."', '".$_POST['senha']."');";
		$conexao->exec($sql);

	}elseif($_GET['operacao'] == "update"){
		
		$sql = "UPDATE pessoa SET nome = '".$_POST["nome"]."', matricula = '".$_POST["matricula"]."', cpf = '".$_POST["cpf"]."', tipo = '".$_POST["tipo"]."', email = '".$_POST["email"]."' WHERE id = ". $_POST["id"];
		$conexao->exec($sql);
		
	}elseif($_GET['operacao'] == "delete") {
		
		$sql = "DELETE FROM pessoa WHERE id = " . $_POST['id'];
		$conexao->exec($sql);

	}
	/*
	if ($_GET['operacao'] == "insert") {
		$sql = "INSERT INTO `solicitacao_disciplina` (`id_solicitacao`, `id_disciplina`) 
		VALUE (".$_POST['solicitacao'].", ".$_POST['disciplina'].");";
		
		//var_dump($sql);
		$conexao->exec($sql);
		//matar a variavel resultado
	}elseif($_GET['operacao'] == "delete") {
		$sql = "DELETE FROM solicitacao_disciplina WHERE id = " . $_POST['id'];
		$conexao->exec($sql);
	}
	*/

	$conexao = null; //fecha a conexão
}else{
	echo "Nenhum parâmetro foi passado.";
}

?>