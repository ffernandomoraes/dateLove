// mascara do input
$('#dateLove').mask('00/00/0000');

// forçando a inserir um valor
$('#buttonCalculate').click(function(){

	if($('#dateLove').val() == ""){
		alert('Preencha o campo por favor.');
		$('#dateLove').focus();
		return false;
	}
	else{
		location = '?dateLove=' + $('#dateLove').val();
	}

});

$(document).keypress(function(e) {
    if(e.which == 13) $('#buttonCalculate').click();
});
