//Máscara valor monetário.
$(document).ready(function(){
	$("#preco").keypress(function(){
		v_obj=this;
		v_fun=moeda;
		setTimeout('execmascara()',1);
	});

	$("#total").keypress(function(){
		v_obj=this;
		v_fun=moeda;
		setTimeout('execmascara()',1);
	});

	$("select").on("change", function(){
		var total = 0;
		$("select option:selected").each(function(){
			total+= parseFloat($(this).attr('preco')); 
		});
		$("#total").val(total.toFixed(2));
		v_obj=$("#total");
		v_fun=moeda;
		setTimeout('execmascara2	()',1);
	}).trigger("change");

});

function execmascara(){
	v_obj.value=v_fun(v_obj.value);
}


function execmascara2(){
	v_obj.val(v_fun(v_obj.val()));
}

function moeda(v){ 
v=v.replace(/\D/g,"") // permite digitar apenas numero 
v=v.replace(/(\d{1})(\d{17})$/,"$1.$2") // coloca ponto antes dos ultimos digitos 
v=v.replace(/(\d{1})(\d{13})$/,"$1.$2") // coloca ponto antes dos ultimos 13 digitos 
v=v.replace(/(\d{1})(\d{10})$/,"$1.$2") // coloca ponto antes dos ultimos 10 digitos 
v=v.replace(/(\d{1})(\d{8})$/,"$1.$2") // coloca ponto antes dos ultimos 8 digitos 
v=v.replace(/(\d{1})(\d{5})$/,"$1.$2") // coloca ponto antes dos ultimos 5 digitos 
v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2") // coloca virgula antes dos ultimos 2 digitos 
v = "R$" + v; 
return v;
}