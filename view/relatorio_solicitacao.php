<?php include("cabecalho.php"); ?>

<div class="container">

	<?php 
		include("../dao/conexao.php");
		$link = new conexao();
		$conexao = $link->conecta();

		$var_where = "";
		
		if (isset($_GET['disciplina'])) {
			
			$var_where = " WHERE ";
			$i = 0;
			
			if ($_GET['disciplina'] != "") {
			 	$var_where .= " dis.id = ".$_GET['disciplina'];
			 	$i++;
			}

			if ($_GET['semestre'] != "") {
			 	if ($i != 0) {
			 		$var_where .= " AND ";
			 	}
			 	$var_where .= " sol.semestre = '".$_GET['semestre']."'";
			}
		}
			
		$sql = "SELECT 
					dis.nome AS disciplina, count(dis.id) AS quantidade, sol.semestre
				FROM solicitacao sol 
				INNER JOIN solicitacao_disciplina sdi 
					ON sol.id = sdi.id_solicitacao 
				INNER JOIN disciplina dis 
					ON sdi.id_disciplina = dis.id 
				".$var_where." 
				GROUP BY dis.id
				ORDER BY dis.nome";
		$query = $conexao->query($sql);
	?>
	
	<div style="margin:20px;">
		<center> 
			<h5>Relatório de Solicitações do sistema</h5>
			<a href="form_solicitacao.php"> <button type="button" class="waves-effect waves-light btn">Novo</button> </a>
		</center>
	</div>
	
	<div>
		<table class="bordered">
			<thead>
				<tr> 
					<td>Disciplina	</td> 
					<td>Quantidade	</td>
					<td>Semestre	</td>
				</tr>
			</thead>

				<?php while ($linha = $query->fetch(PDO::FETCH_OBJ)):/*mysql_fetch_row($query)):*/?>

				<tr>
					<td> <?php echo utf8_encode($linha->disciplina) ?> 	</td>
					<td> <?php echo utf8_encode($linha->quantidade); ?> </td>
					<td> <?php echo $linha->semestre ?> 		  		</td>
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