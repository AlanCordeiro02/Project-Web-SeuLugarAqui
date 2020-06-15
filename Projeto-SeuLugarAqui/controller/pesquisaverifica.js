$(function(){
	$("#pesquisa").keyup(function(){
		//Recuperar o valor do campo
		var pesquisa = $(this).val();
		
		//Verificar se há algo digitado
		if(pesquisa != ''){
			var dados = {
				palavra : pesquisa
			}
			$.post('pesquisa_evento.php', dados, function(retorna){
				//Mostra dentro da ul os resultado obtidos 
				$(".resultado").html(retorna);
			});
		}
	});
});
function chamarPhpAjax() {
	$.ajax({
	   url:'pesquisa_evento.php',
	   complete: function (response) {
		  alert(response.responseText);
	   },
	   error: function () {
		   alert('Erro');
	   }
   });  
 
   return false;
 }


