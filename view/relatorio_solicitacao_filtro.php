<?php include("cabecalho.php"); ?>

	<?php 
		include("../dao/conexao.php");
		$link = new conexao();
		$conexao = $link->conecta();
		
		$sql   = "SELECT id, nome FROM disciplina";
		$disciplinas = $conexao->query($sql);	
	?>

    
      <div class="row" style="margin-top:5%;">
        <div class="col s12 m8 l4 offset-m2 offset-l4" >
          
          <div class="card-container col s12  grey lighten-5 z-depth-3">
          	<h5 style="text-align:center;">Filtro - Relatório de Solicitações</h5>
            <form action="">  
                <div class="input-field col s12">                  				
		  			<select id="disciplina" name="disciplina" required>
		      			<option value="" disabled selected>Selecione</option>
		      			<?php 
		      				while($disciplina = $disciplinas->fetch(PDO::FETCH_OBJ)){
		      					echo "<option value='".$disciplina->id."''>".utf8_encode($disciplina->nome)."</option>" ;
		      				} 
		      			?>
		    		</select>
	                <label>Disciplina</label>
              	</div>
              			
               	<div class="input-field col s12">
                	<label>Semestre</label>
	   				<input type="text" class="form-control" id="semestre" name="semestre" value="2015.1" required>
                </div>

              	<!-- Botão -->
                <div class="col s12" style="margin-bottom:20px;">
                  <center> <button type="button" class="waves-effect waves-light btn" onclick="filtraRelatorioSolicitacao();">Pesquisar</button> </center>
                </div>
              
            </form>
          </div>
        </div>
      </div>
    
	
	<?php 
	//fecha a conexão
	//mysql_close($conexao);
	$conexao = $link->desconecta($conexao);
	?>

<?php include("rodape.php"); ?>