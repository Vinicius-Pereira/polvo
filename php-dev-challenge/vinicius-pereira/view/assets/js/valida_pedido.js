$(document).ready(function(){
	$("form").submit(function(e){
		var erro = false;
		var data = $("data").val();
		if(validaVencimento()){
			erro = true;
		}
		if(($("#total")).val() == "R$0,00"){
			erro = true;
		}
		if(erro == true){
			$(".alert").removeClass("avoid");
			e.preventDefault();
		}else{
			$(".alert").addClass("avoid");
		}
	});
});

function validaVencimento(){
	var atual = new Date();
	var dd = atual.getDate();
	var mm = atual.getMonth()+1; //January is 0!
	var yyyy = atual.getFullYear();

	if(dd<10) {
		dd = '0'+dd
	} 
	if(mm<10) {
		mm = '0'+mm
	} 
	atual = yyyy + '-' + mm + '-' + dd;
	return Date.parse($("#data").val()) < Date.parse(atual);
}