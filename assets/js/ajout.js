$(document).ready(function(){
	$('form textarea#shortdesc').keyup(function(){
		var caract = 128 - $(this).val().length;
		if(caract < 0){
			$('form p#caractRest').css('color','red');
		}else{
			$('form p#caractRest').css('color','green');
		}
		$('form p#caractRest span#count').html(caract);
	});
	/*Vérification Formulaire avant l'envoi*/
	var okForm = true;
	var messageError = '';
	$('form').submit(function(){
		if($(this).children('input#title').val() == ''){
			okForm = false;
			messageError += '<li> Vous devez écrire un titre! </li>';
		}
		if($(this).children('input#year').val() == ''){
			okForm = false;
			messageError += "<li> Vous devez ajouter l'année de production! </li>";
		}
		if($(this).children('textarea#shortdesc').val() == ''){
			okForm = false;
			messageError += "<li> Vous devez mettre une courte description! </li>";
		}
		if($(this).children('textarea#shortdesc').val().length > 128){
			okForm = false;
			messageError += "<li> Vous devez écrire une description plus courte! </li>";
		}
		if($(this).children('input#fileToUpload').val() == ''){
			okForm = false;
			messageError += "<li> Vous devez ajouter une image! </li>";
		}
		if(okForm == false){
			$('ul#error-messages').html(messageError);
			return false;
		}
	})
});