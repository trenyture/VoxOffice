/*Fonction de resize des éléments*/
function sizeElement(){
	console.log('yep');
}
/*Dès que tout est prêt*/
$(document).ready(function(){
	sizeElement();
});
/*Lorsque l'on resize l'écran*/
$(window).resize(sizeElement);