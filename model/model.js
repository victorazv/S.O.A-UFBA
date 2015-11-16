function verificaSessao (){
	$.ajax({
		method: "POST",
		url: "../model/verifica_sessao.php",
		context: document.body
	}).done(function(data) {
		$( this ).addClass( "done" );
	});
}