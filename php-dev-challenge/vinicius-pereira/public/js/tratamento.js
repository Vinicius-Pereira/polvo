$(document).ready(function(){
	$("#sku").focusout(function(){
		this.value = this.value.toUpperCase();
	});

	$("#nome").focusout(function(){
		this.value = this.value.toUpperCase();
	});
});