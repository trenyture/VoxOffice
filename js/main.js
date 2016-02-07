// Elements resize
/*function sizeElement(){
	console.log('resize!');
}*/

$(document).ready(function(){
	// Resize call
    //sizeElement();
    
    // CSS transitions
    new WOW().init();
    
    // Scroll link
    $(function () {
        $('a[href*="#"]:not([href="#"])').click(function () {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 60
                    }, 500);
                    return false;
                }
            }
        });
    });
});

// On screen resize
//$(window).resize(sizeElement);