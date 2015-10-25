<?php 
	//Em desuso
	include("conexao.php");
	$link = new conexao();
	$conexao = $link->conecta();

	$sql = "UPDATE pessoa SET nome = '".$_POST["nome"]."', matricula = '".$_POST["matricula"]."', cpf = '".$_POST["cpf"]."', tipo = '".$_POST["tipo"]."', email = '".$_POST["email"]."' WHERE id = ". $_POST["id"];
	$conexao->exec($sql);

	$conexao = null; //fecha a conexão

?>

<script type="text/javascript">
	alert("Registro alterado com sucesso!");
</script>

<?php 
	header("Location: ../view/pessoa.php?id=".$_POST["id"] );
?>