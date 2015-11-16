/* Inserts */

function inserePessoa(){
	//pegando os valores com jquery
	var nome      = $("#nome")[0].value;
	var matricula = $("#matricula")[0].value;
	var cpf 	  = $("#cpf")[0].value;
	var tipo 	  = $("#tipo")[0].value;
	var email 	  = $("#email")[0].value;
	var senha 	  = $("#senha")[0].value;

	$.ajax({
		method: "POST",
		url: "../dao/crud_pessoa.php?operacao=insert",
		data: {nome: nome, matricula: matricula, cpf: cpf, tipo: tipo, email: email, senha: senha},
		context: document.body
	}).done(function() {
	  	$( this ).addClass( "done" );
		alert("Registro incluido com sucesso!");
		window.location.assign("../view/index.php");
	});

}

function insereSolicitacao(){			
	//pegando os valores com jquery
	var aluno 	 = $("#nome")[0].value;
	var data 	 = $("#data")[0].value;
	var semestre = $("#semestre")[0].value;
	$.ajax({
		method: "POST",
		url: "../dao/crud_solicitacao.php?operacao=insert",
		data: {aluno: aluno, data: data, semestre: semestre},
		context: document.body
	}).done(function(data) {
		$( this ).addClass( "done" );
		alert("Solicitação incluída com sucesso!");
		window.location.assign("../view/form_solicitacao.php?id="+ data );
	});
}

function insereDisciplinaSolicitacao(){
	//pegando os valores com jquery
	var disciplina 	 = $("#disciplina")[0].value;
	var solicitacao	 = $("#id")[0].value;	
	$.ajax({
		method: "POST",
		url: "../dao/crud_solicitacao.php?operacao=insert_dis",
		data: {disciplina: disciplina, solicitacao: solicitacao},
		context: document.body,
		success: function(resultado){
			if(resultado == "cadastrada"){
				alert("Disciplina já cadastrada na Solicitação!");
			}
			if(resultado == "limite"){
				alert("Limite de disciplinas da Solicitação atingido!");
			}
		} 
	});
	location.reload();
}


/* Updates */

function atualizaPessoa(){
	//pegando os valores com jquery
	var id     	  = $("#id")[0].value;
	var nome      = $("#nome")[0].value;
	var matricula = $("#matricula")[0].value;
	var cpf 	  = $("#cpf")[0].value;
	var tipo 	  = $("#tipo")[0].value;
	var email 	  = $("#email")[0].value;

	$.ajax({
		method: "POST",
		url: "../dao/crud_pessoa.php?operacao=update",
		data: {id: id, nome: nome, matricula: matricula, cpf: cpf, tipo: tipo, email, email},
		context: document.body
	}).done(function() {
	  	$( this ).addClass( "done" );
		alert("Registro atualizado com sucesso!");
		//window.location.assign("../view/pessoa.php");
	});
}

function atualizaSolicitacao(){
	//pegando os valores com jquery
	var id 	 	 = $("#id")[0].value;
	var aluno 	 = $("#nome")[0].value;
	var data 	 = $("#data")[0].value;
	var semestre = $("#semestre")[0].value;

	$.ajax({
		method: "POST",
		url: "../dao/crud_solicitacao.php?operacao=update",
		data: {id: id, aluno: aluno, data: data, semestre: semestre},
		context: document.body
	}).done(function() {
	  	$( this ).addClass( "done" );
		alert("Registro atualizado com sucesso!");
		//window.location.assign("../view/pessoa.php");
	});
}
/* Deletes */

function excluiPessoa(id){			

	$.ajax({
	  	method: "POST",
	  	url: "../dao/crud_pessoa.php?operacao=delete",
		data: {id: id},
		context: document.body
	}).done(function() {
	  	$( this ).addClass( "done" );
	  	alert("Registro excluído com sucesso!");
	  	window.location.assign("../view/pessoa.php");
	});
}

function excluiDisciplinaSolicitacao(id){
	$.ajax({
	  	method: "POST",
	  	url: "../dao/crud_solicitacao.php?operacao=delete_dis",
		data: {id: id},
		context: document.body
	}).done(function() {
	  	$( this ).addClass( "done" );
	  	alert("Disciplina excluída com sucesso!");
	  	location.reload();
	});
}

/* Filtro */

function filtraSolicitacao(){
	//pegando os valores com jquery
	var aluno 	 = $("#nome")[0].value;
	var data 	 = $("#data")[0].value;
	var semestre = $("#semestre")[0].value;

	if (aluno == "" && data == "" && semestre == "") {
		window.location.assign("../view/solicitacao.php");
	}else{
		window.location.assign("../view/solicitacao.php?aluno="+aluno+"&data="+data+"&semestre="+semestre);
	}
}

function filtraRelatorioSolicitacao(){
	//pegando os valores com jquery
	var disciplina 	= $("#disciplina")[0].value;
	var semestre 	= $("#semestre")[0].value;

	if (disciplina == "" && semestre == "") {
		window.location.assign("../view/relatorio_solicitacao.php");
	}else{
		window.location.assign("../view/relatorio_solicitacao.php?disciplina="+disciplina+"&semestre="+semestre);
	}
}