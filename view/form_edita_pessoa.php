<?php 
	include("cabecalho.php");

	if (isset($_GET['id'])) {
		
		include("../dao/conexao.php");
		$link = new conexao();
		$conexao = $link->conecta();

		//Traz os dados para preencher os campos
		$sql   = "SELECT * FROM pessoa WHERE id = ".$_GET['id'];
		$query = $conexao->query($sql);
		$linha = $query->fetch(PDO::FETCH_OBJ);
	} 
?>

<div class="container">	
	
	<form>
	
		<div style="margin:20px;">
			<center>
				<a href="pessoa.php"> <button type="button" class="btn btn-default btn-sm">Voltar <i class="material-icons">backspace</i></button> </a>
				
				<button id="incluir" class="btn waves-effect waves-light" type="button" onclick="inserePessoa();">Incluir<i class="material-icons right">send</i></button>
				
				<button id="alterar" class="btn waves-effect waves-light" type="button" onclick="atualizaPessoa();">Alterar<i class="material-icons">replay</i></button>

				<!--<button id="excluir" class="btn waves-effect waves-light" type="button" onclick= 
					<?php if( isset($_GET['id']) ){
						echo "excluiPessoa(" . $_GET['id'] . ")";
					}else{ echo ""; }?> >Excluir<i class="material-icons">delete</i>
				</button>-->
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

	   	<label>E-mail</label>
	   	<input type="email" class="form-control" id="email" name="email" required>

	   	<label>Tipo</label>
		<select id="tipo" name="tipo" required>
			<option value="" disabled selected>Selecione</option>
			<option value="A">Aluno</option>
			<option value="P">Professor</option>
		</select>
          	
	</form>

</div>

<?php if (isset($_GET["id"])) : ?>
	
	<script>
		//Atribui valor aos campos
		var id  		= document.getElementById("id");
		id.value    	= <?php echo $_GET['id'] ?>;

		var nome		= document.getElementById("nome");
		nome.value  	= "<?php echo utf8_encode($linha->nome) ?>";

		var matricula	= document.getElementById("matricula");
		matricula.value = "<?php echo $linha->matricula ?>";
		
		var cpf	  		= document.getElementById("cpf");
		cpf.value 		= "<?php echo $linha->cpf ?>";

		var tipo   		= document.getElementById("tipo");
		tipo.value 		= "<?php echo $linha->tipo ?>";
		
		var email 		= document.getElementById("email");
		email.value 	= "<?php echo $linha->email ?>";
	</script>

<?php endif; ?>

<?php include("rodape.php"); ?>

<!-- Oculta os botões -->
<?php 
	if (isset($_GET['id'])){
		?> <script> ocultaIncluir(); </script> <?php 
	}else{
		?> <script> ocultaAlterar(); //ocultaExcluir();</script> <?php 
	}
?>