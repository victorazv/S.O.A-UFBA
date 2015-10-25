<?php include("cabecalho.php"); ?>

<div class="container">

	<?php 
		session_start();
		include("../dao/conexao.php");
		$link = new conexao();
		$conexao = $link->conecta();

		$sql = "SELECT 
					sol.id, pes.nome AS aluno, pescor.nome AS coordenador, sol.data, sol.semestre 
				FROM solicitacao sol 
				INNER JOIN pessoa pes 
					ON sol.id_pessoa = pes.id 
				LEFT JOIN coordenador cor 
					ON sol.id_coordenador = cor.id 
				LEFT JOIN pessoa pescor 
					ON cor.id_pessoa = pescor.id
				ORDER BY sol.id DESC";
		$query = $conexao->query($sql);
	?>
	
	<div style="margin:20px;">
		<center> 
			<h5>Solicitações do sistema</h5>
			<a href="form_solicitacao.php"> <button type="button" class="waves-effect waves-light btn">Novo</button> </a>
		</center>
	</div>
	
	<div>
		<table class="bordered">
			<thead>
				<tr> 
					<td>			</td>
					<td>Aluno 		</td> 
					<td>Coordenador	</td>
					<td>Data		</td>
					<td>Semestre	</td>
				</tr>
			</thead>

				<?php while ($linha = $query->fetch(PDO::FETCH_OBJ)):/*mysql_fetch_row($query)):*/?>

				<tr>
					<td><a href= <?php echo "form_solicitacao.php?id=".$linha->id; ?> ><img src="../img/lapis.png"></a></td>
					<td> <?php echo utf8_encode($linha->aluno) ?> </td>
					<td> <?php echo $linha->coordenador ?> 		  </td>
					<td> <?php echo $linha->data ?> 		 	  </td>
					<td> <?php echo $linha->semestre ?> 		  </td>
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