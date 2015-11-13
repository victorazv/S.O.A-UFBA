<?php include("cabecalho.php"); ?>

<div class="container">

	<?php 
		include("../dao/conexao.php");
		$link = new conexao();
		$conexao = $link->conecta();
		
		$sql   = "SELECT id, nome FROM pessoa";
		$pessoas = $conexao->query($sql);	
	?>
	
	<div style="margin:20px;">
		<center> 
			<h5>Filtro - Solicitações do sistema</h5>
			
			<form>
		  		<label>Aluno</label>
	  			<select id="nome" required>
	      			<option value="" disabled selected>Selecione</option>
	      			<?php 
	      				while($pessoa = $pessoas->fetch(PDO::FETCH_OBJ)){
	      					echo "<option value='".$pessoa->id."''>".utf8_encode($pessoa->nome)."</option>" ;
	      				} 
	      			?>
	    		</select>
	   		
	    		<div style="width:40%; float:left; margin-right:20%;">
	    			<label>Data</label>
	   				<input type="date" class="form-control" id="data" name="data" required>
	   			</div>	
	   			<div style="width:40%;  float:left;">
	   				<label>Semestre</label>
	   				<input type="text" class="form-control" id="semestre" name="semestre" value="2015.1" required>
		   		</div>
			</form>

			<button type="button" class="waves-effect waves-light btn" onclick="filtraSolicitacao();" >Pesquisar</button>
		</center>
	</div>
	
	<div>
		
	</div>
	<?php 
	//fecha a conexão
	//mysql_close($conexao);
	$conexao = $link->desconecta($conexao);
	?>

</div>

<?php include("rodape.php"); ?>