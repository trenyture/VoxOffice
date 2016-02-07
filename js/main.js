// Elements resize
/*function sizeElement(){
	console.log('resize!');
}*/

$(document).ready(function() {
    // Smooth scroll
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
    
    // CSS transitions
    new WOW().init();
    
    // Header styles on scroll
    $(window).scroll(function() {
        var scrollTop = $(this).scrollTop();

        if (scrollTop > 0) {
            $('header').addClass('scrolled');
        } else {
            $('header').removeClass('scrolled');
        }
        return false;
    });
    
	// Resize call
    //sizeElement();
});

// On screen resize
//$(window).resize(sizeElement);