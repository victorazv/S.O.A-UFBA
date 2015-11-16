<?php include("cabecalho.php"); ?>

<div class="container">

	<?php 
		include("../dao/conexao.php");
		$link = new conexao();
		$conexao = $link->conecta();

		$sql = "SELECT * FROM pessoa ORDER BY nome ASC";
		$query = $conexao->query($sql);
		//$query = mysql_query($sql);
		/*if(!$query){
			echo "Não foi possível executar a consulta ($sql) no banco de dados: " . mysql_error();
	    	exit;
		}*/
	?>
	
	<div style="margin:20px;">
		<center> 
			<h5>Pessoas do sistema</h5>
			<!--<a href="form_pessoa.php"> <button type="button" class="waves-effect waves-light btn">Novo</button> </a>-->
		</center>
	</div>
	
	<div>
		<table class="bordered">
			<thead>
				<tr> 
					<td>			</td>
					<td>Nome 		</td> 
					<td>Matrícula	</td>
					<td>CPF			</td>
					<td>Tipo		</td>
					<td>E-mail		</td>
				</tr>
			</thead>

				<?php while ($linha = $query->fetch(PDO::FETCH_OBJ)):/*mysql_fetch_row($query)):*/?>
				<?php if ($linha->tipo == "A"): $linha->tipo = "Aluno" ?>
				<?php endif ?>
				<?php if ($linha->tipo == "P"): $linha->tipo = "Professor" ?>
				<?php endif ?>

				<tr>
					<td><a href= <?php echo "form_edita_pessoa.php?id=".$linha->id; ?> ><img src="../img/lapis.png"></a></td>
					<td> <?php echo utf8_encode($linha->nome) ?> 	 </td>
					<td> <?php echo $linha->matricula ?> </td>
					<td> <?php echo $linha->cpf ?> 		 </td>
					<td> <?php echo $linha->tipo ?>  	 </td>
					<td> <?php echo $linha->email ?> 	 </td>
				</tr>
			<?php endwhile ?>
		</table>
	</div>
	<?php 
	//fecha a conexão
	//mysql_close($conexao);
	$conexao = $link->desconecta($conexao);
	?>

</div>

<?php include("rodape.php"); ?>