$(document).ready(function () {

    // Smooth scroll
    $(function () {
        $('a[href*="#"]:not([href="#"])').click(function () {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    if ($(window).width() >= 768) {
                        $('html, body').animate({
                            scrollTop: target.offset().top - 60
                        }, 500);
                        return false;
                    } else {
                        $('html, body').animate({
                            scrollTop: target.offset().top - 44
                        }, 500);
                        return false;
                    }
                }
            }
        });
    });

    // Header styles on scroll
    window.onload = function () {
        var scrollTop = $(this).scrollTop();

        if (scrollTop > 0) {
            $('header').addClass('scrolled');
        } else {
            $('header').removeClass('scrolled');
        }
        return false;
    }
    $(window).scroll(function () {
        var scrollTop = $(this).scrollTop();

        if (scrollTop > 0) {
            $('header').addClass('scrolled');
        } else {
            $('header').removeClass('scrolled');
        }
        return false;
    });

    // Mobile menu opening {
    $('.hamburger').on('click', function (e) {
        e.preventDefault();
        $(this).toggleClass('active');
        $('nav').toggleClass('open-menu');
    });
    
    // Blur switch
    $(function() {
        var input = $('#blurSwitch input');
        
        $(input).prop('checked', true);
        $(input).click(blurSwitch);
    });
    function blurSwitch() {
        var blurredImage = $('.vote-container .article-image');
        
        if (this.checked) {
            $(blurredImage).attr('checked', true).css({
                'webkit-filter': 'blur(.8rem)',
                'filter': 'blur(.8rem)'
            });
            $(blurredImage).hover(function() {
                $(this).css({
                    'webkit-filter': 'blur(0)',
                    'filter': 'blur(0)'
                });
            });
        } else {
            $(blurredImage).removeAttr('checked').css({
                'webkit-filter': 'blur(0)',
                'filter': 'blur(0)'
            });
        }
    }
    
    // Label animations
    $('form input, form select, form textarea').blur(function() {
        if ($(this).val()) {
            $(this).parents('div').addClass('filled');
        } else {
            $(this).parents('div').removeClass('filled');
        }
    });
    
    // Display search result
    //$('form#search button[type="submit"]').on('click', function() {
        var resultsNumber = $('#results li').length;
        
        //$('form .results-container').removeClass('hidden');
        $('form h2 big').text(resultsNumber);
    //});
});