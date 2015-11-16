<?php 
	include("cabecalho.php");
	
	include("../dao/conexao.php");
	$link = new conexao();
	$conexao = $link->conecta();

	//Traz os dados para preencher os campos select
	$sql   = "SELECT id, nome FROM pessoa WHERE tipo = 'A'";
	$pessoas = $conexao->query($sql);	
	$sql   = "SELECT id, nome FROM disciplina";
	$disciplinas = $conexao->query($sql);	
	
	if (isset($_GET['id'])){
		$sql_2 = "SELECT 
					dis.nome AS disciplina, sdi.id  
				FROM solicitacao_disciplina sdi
				INNER JOIN disciplina dis
					ON sdi.id_disciplina = dis.id 
				WHERE sdi.id_solicitacao = ".$_GET['id'];
			
		$query_dis 	 = $conexao->query($sql_2);
		//$disciplinas = $query_dis->fetch(PDO::FETCH_OBJ);
	}
?>

<div class="container">	
	
	<form>
	
		<div style="margin:20px;">
			<center>
				<a href="solicitacao.php"> <button type="button" class="btn btn-default btn-sm">Voltar <i class="material-icons">backspace</i></button> </a>
				<button id="incluir" class="btn waves-effect waves-light" type="button" onclick="insereSolicitacao();">Incluir<i class="material-icons right">send</i></button>
				<button id="alterar" class="btn waves-effect waves-light" type="button" onclick="atualizaSolicitacao();">Alterar<i class="material-icons">replay</i></button>
			</center>
		</div>


    <div style="margin-top:5%;">
        <div class="col s12 m8 l4 offset-m2 offset-l4" >
          <div class="card-container col s12  grey lighten-5 z-depth-3">

			<h5 style="text-align:center;">Cadastro de solicitação</h5>	

		    <input type="hidden" id="id">
		   	<input type="hidden" id="coordenador">
			<center>
	  		
	  		<div style="width:50%; text-align:left;">
	  		<label>Aluno</label>
	  		<select id="nome" required >
	      		<option value="" disabled selected>Selecione</option>
	      		<?php 
	      			while($pessoa = $pessoas->fetch(PDO::FETCH_OBJ)){
	      				echo "<option value='".$pessoa->id."''>".utf8_encode($pessoa->nome)."</option>" ;
	      			} 
	      		?>
	    	</select>
	    	</div>
	   		<div class="col s12" style="width:50%; text-align:left;">
	    		<label>Data</label>
	   			<input type="date" class="form-control" id="data" name="data" required>
	   		</div>
	   		<div class="col s12" style="width:50%; text-align:left;">
	   			<label>Semestre</label>
	   			<input type="text" class="form-control" id="semestre" name="semestre" value="2015.1" required>
			</div>
			</center>
		</form>
		<div class="divider"></div>
	
<?php 
//Se tiver $query_dis, libera a consulta. Se tem q variável, significa que é uma alteração e não uma inclusão
if(isset($query_dis)){ ?>
	<div>
		<center>
			<button style="text-align:center; margin-top:20px;" id="incluir" class="btn waves-effect waves-light" type="button" onclick="insereDisciplinaSolicitacao();">Incluir disciplina<i class="material-icons right">send</i></button>
		
			<form>	
				<input type="hidden" id="id_dis">
			   	<input type="hidden" id="id_sol">
				
				<div class="col s12" style="width:50%; text-align:left;">
		  			<label>Disciplina</label>
		  			<select id="disciplina" required>
		      			<option value="" disabled selected>Selecione</option>
		      			<?php 
		      				while($disciplina = $disciplinas->fetch(PDO::FETCH_OBJ)){
		      					echo "<option value='".$disciplina->id."''>".utf8_encode($disciplina->nome)."</option>" ;
		      				} 
		      			?>
		    		</select>
	    		</div>
		</center>
			</form>

	</div>
	<div class="divider"></div>
	<div>
		<h5 style='text-align:center;'>Disciplinas da solicitação:</h5>	
		<table class='bordered'>
		<?php while ($disciplinas = $query_dis->fetch(PDO::FETCH_OBJ)):?>
			<tr>
				<td><a href="" onclick="excluiDisciplinaSolicitacao(<?php echo $disciplinas->id; ?>)"> <i class='material-icons'>delete</i> </a></td>
				<td> <?php echo utf8_encode($disciplinas->disciplina) ?> 	 </td>
			</tr>
			<?php endwhile ?>
		</table>
	</div>
	<?php } ?>

</div>

<?php 
	include("rodape.php");

	if (isset($_GET['id'])){
		//Traz os dados para preencher os campos
		$sql   = "SELECT 
					sol.id, pes.id AS aluno, pescor.nome AS coordenador, sol.data, sol.semestre 
				FROM solicitacao sol 
				INNER JOIN pessoa pes 
					ON sol.id_pessoa = pes.id 
				LEFT JOIN coordenador cor 
					ON sol.id_coordenador = cor.id 
				LEFT JOIN pessoa pescor 
					ON cor.id_pessoa = pescor.id
				WHERE sol.id = ".$_GET['id'];
				
		$query = $conexao->query($sql);
		$linha = $query->fetch(PDO::FETCH_OBJ);
		?>
		<script>
		//Atribui valor aos campos
		var id  		 = document.getElementById("id");
		id.value    	 = <?php echo $_GET['id'] ?>;

		var nome		 = document.getElementById("nome");
		nome.value  	 = "<?php echo $linha->aluno ?>";

		var data		 = document.getElementById("data");
		data.value 	 	 = "<?php echo $linha->data ?>";
		 
		var semestre	 = document.getElementById("semestre");
		semestre.value 	 = "<?php echo $linha->semestre ?>";

		ocultaIncluir();
	</script>
	<?php
	}else{
	?> <script> 
			ocultaAlterar(); 
			ocultaExcluir();
			//atribui a data do sistema para o campo
			var data = document.getElementById("data");
			data.value = "<?php echo date('Y-m-d') ?>";
			</script> 
		<?php 
	}
?>