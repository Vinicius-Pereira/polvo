$(document).ready(function(){
	$("form").submit(function(e){
		var erro = false;
		if(($("#nome")).val().length < 1){
			erro = true;
		}
		if(($("#sku")).val().length < 1){
			erro = true;
		}
		if(($("#preco")).val().length < 1){
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