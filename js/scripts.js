// Elements resize
function sizeElement(){
	console.log('resize!');
}

$(document).ready(function(){
	sizeElement();
});

// On screen resize
$(window).resize(sizeElement);