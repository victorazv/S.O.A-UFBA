<?php 

if (isset($_GET['operacao'])) {

	include("conexao.php");
	$link = new conexao();
	$conexao = $link->conecta();

	if ($_GET['operacao'] == "insert") 
	{
		
		$sql = "INSERT INTO `solicitacao` (`id_pessoa`, `id_coordenador`, `data`, `semestre`) 
		VALUE (".$_POST['aluno'].", null, '".$_POST['data']."', '".$_POST['semestre']."');";
		$conexao->exec($sql);
		
		$sql   		 = "SELECT MAX(id) AS id FROM solicitacao";
		$query = $conexao->query($sql);
		$solicitacao = $query->fetch(PDO::FETCH_OBJ);
		echo $solicitacao->id;
	
	}
	elseif($_GET['operacao'] == "insert_dis")
	{
		$sql = "SELECT id FROM solicitacao_disciplina WHERE id_solicitacao = ".$_POST['solicitacao']." AND id_disciplina = ".$_POST['disciplina'];
		$query = $conexao->query($sql);
		$cadastrada = $query->fetch(PDO::FETCH_OBJ);
		
		if($cadastrada){
			echo "cadastrada";
			exit;
		}

		$sql = "SELECT count(*) AS qtd FROM solicitacao_disciplina WHERE id_solicitacao = ".$_POST['solicitacao'];
		$query = $conexao->query($sql);
		$limite = $query->fetch(PDO::FETCH_OBJ);
		
		if($limite->qtd == 10){
			echo "limite";
			exit;
		}


		$sql = "INSERT INTO `solicitacao_disciplina` (`id_solicitacao`, `id_disciplina`) 
		VALUE (".$_POST['solicitacao'].", ".$_POST['disciplina'].");";
		$conexao->exec($sql);
	}
	elseif($_GET['operacao'] == "update")
	{
		
		$sql = "UPDATE solicitacao SET id_pessoa = ".$_POST["aluno"].", id_coordenador = null, data = '".$_POST["data"]."', semestre = '".$_POST["semestre"]."' WHERE id = ". $_POST["id"];
		$conexao->exec($sql);
		
	}
	elseif($_GET['operacao'] == "delete") 
	{
		
		$sql = "DELETE FROM solicitacao WHERE id = " . $_POST['id'];
		$conexao->exec($sql);
	}
	elseif($_GET['operacao'] == "delete_dis") 
	{
		
		$sql = "DELETE FROM solicitacao_disciplina WHERE id = " . $_POST['id'];
		$conexao->exec($sql);
	}

	$conexao = null; //fecha a conexão
}
else
{
	echo "Nenhum parâmetro foi passado.";
}

?>