function lookingTitle(datas) {
    var liRes = "";
    $data = $(datas);
    $data.each(function () {
        liRes += '<li>';
        liRes += this.title + ' - ' + this.annee;
        liRes += '</li>';
    });
    liRes += "<li><a onclick='changeFormAdd();' href='#'>Votre film n'apparaît pas ?</a></li>";
    $('ul#results').html(liRes);
}

function changeFormAdd() {
    $('form#formadd').removeClass('hidden');
    $('form#search').addClass('hidden');
    return false;
}

$(document).ready(function () {
    $('form#search input#searchtitle').keyup(function () {
        // On ne fait la recherche qu'à partir de 3 caractères minimum
        if ($(this).val().length > 2) {
            var searchKey = $(this).val();
            console.log(searchKey);
            $.ajax({
                url: 'assets/php/searchtitle.php?search=' + searchKey,
                dataType: 'json',
                success: function (data) {
                    lookingTitle(data);
                }
            });
        }
    })
    // Vérification Formulaire avant l'envoi
    $('form#formadd').submit(function () {
        var okForm = true;
        var messageError = '';
        if ($(this).children('input#title').val() == '') {
            okForm = false;
            messageError += '<li>Veuillez renseigner un titre.</li>';
        }
        if ($(this).children('input#year').val() == '') {
            okForm = false;
            messageError += "<li>Veuillez renseigner une année de production</li>";
        }
        if ($(this).children('input#author').val() == '') {
            okForm = false;
            messageError += "<li>Veuillez renseigner le nom et prénom du réalisateur</li>";
        }
        if ($(this).children('input#fileToUpload').val() == '') {
            okForm = false;
            messageError += "<li>Veuillez ajouter une affiche du film</li>";
        }
        if (okForm == false) {
            $('ul#error-messages').html(messageError);
            return false;
        }
    })

    // Display search result
    //$('form#search button[type="submit"]').on('click', function() {
        var resultsNumber = $('#results li').length;

        //$('form .results-container').removeClass('hidden');
        $('form h2 big').text(resultsNumber);
    //});
});

$(document).ready(function () {
    console.log('heeeey');
    $.ajax({
        url: './assets/php/classement.php?wut=good',
        dataType: 'json',
        success: function (data) {
            constructGood(data);
        }
    });
    $.ajax({
        url: './assets/php/classement.php?wut=bad',
        dataType: 'json',
        success: function (data) {
            constructBad(data);
        }
    });

    // Wishlist items
    $('.wishlist').on('click', function() {
        if ($(this).hasClass('fa-heart-o')) {
            $(this).removeClass('fa-heart-o').addClass('wishlisted fa-heart');
        } else {
            $(this).removeClass('wishlisted fa-heart').addClass('fa-heart-o');
        }

        return false;
    });
})

function constructBad(films) {
    console.log(films);
    var i = 1;
    var ulLi = '';
    $films = $(films);
    $films.each(function () {
        ulLi += '<li>';
        ulLi += '<div class="img-film" style="background-image:url(assets/img/films/' + this.image + ');"></div>';
        ulLi += '<p class="desc-film">' + i + ' - ' + this.title + ' <span>( ' + this.annee + ' )</span></p>';
        ulLi += '</li>';
        i = i + 1;
    });
    $('section#worst ul').html(ulLi);
}

function constructGood(films) {
    console.log(films);
    var i = 1;
    var ulLi = '';
    $films = $(films);
    $films.each(function () {
        ulLi += '<li>';
        ulLi += '<div class="img-film" style="background-image:url(assets/img/films/' + this.image + ');"></div>';
        ulLi += '<p class="desc-film">' + i + ' - ' + this.title + ' <span>( ' + this.annee + ' )</span></p>';
        ulLi += '</li>';
        i = i + 1;
    });
    $('section#best ul').html(ulLi);
}

function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
// Sur les vieux navigateur il n'y a pas de verifications d'email du coup voici la fonction!!!

$(document).ready(function () {
    // Vérification formulaire
    $('form').submit(function () {
        var errorMsg = '',
            okSend = true;
        if ($('#mail').val() == '') {
            errorMsg += '<li class="error">Votre email est requis.</li>';
            okSend = false;
        }
        if ($('#mail').val()) {
            var testMail = validateEmail($('#mail').val())
            if (testMail == false) {
                errorMsg += '<li class="error">Veuillez vérifier que votre email soit valide.</li>'
                okSend = false;
            }
        }
        if ($('#sujet').val() == '') {
            errorMsg = '<li class="error">Veuillez renseigner un sujet.</li>'
            okSend = false;
        }
        if ($('#message').val() == '') {
            errorMsg = '<li class="error">Veuillez renseigner votre message.</li>'
            okSend = false;
        }
        if (okSend == false) {
            return false; // Je sais pas si tu sais, mais le return false c'est la nouvelle façon d'écrire event.preventDefault();
            $('ul#error-msg').html(errorMsg);
        }
    });
});

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

    // Label animations
    $('form input, form select, form textarea').blur(function() {
        if ($(this).val()) {
            $(this).parents('div').addClass('filled');
        } else {
            $(this).parents('div').removeClass('filled');
        }
    });
});

// Share Facebook
window.fbAsyncInit = function(){
    FB.init({
        appId: '898558203596431',
        status: true,
        cookie: true,
        xfbml: true,
        version : 'v2.7'
    });
};

(function(d, debug){var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
    if(d.getElementById(id)) {return;}
    js = d.createElement('script'); js.id = id;
    js.async = true;js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
    ref.parentNode.insertBefore(js, ref);}(document, /*debug*/ false)
);
function postToFeed(title, url, image){
    var obj = {method: 'feed',link: 'http://www.simon-tr.com/VoxOffice/', picture: 'http://www.simon-tr.com/VoxOffice/assets/img/films/'+image,name: title,description: "Et toi, pour quoi aurais-tu voté?"};
    function callback(response){
        if(response.post_id){
            randFilms();
        }
    }
    FB.ui(obj, callback);
}

// Fin SDK Fb
function voteFor(link){
    $.ajax({
        url: link,
        success: function (result){
            if(result){
                result = eval(result);
                if(!result[0]){
                    randFilms();
                }else{
                    alert(result[1]);
                }
            }else{
                alert("Vous n'êtes pas connecté!");
            }
        }
    });
}

function randFilms(){
    $.ajax({
        url: './assets/php/rand.php',
        dataType: 'json',
        success: function (data) {
            constructPage(data);
        }
    });
}

function constructPage(films) {
    $films = $(films);
    $.each($films, function(key, value){
        var i = key + 1;
        $('article#film' + i + ' div.article-image').css({
            'background-image': 'url(assets/img/films/' + value.image + ')'
        });
        $('article#film' + i + ' h3').html(value.title);
        $('article#film' + i + ' p.date').html(value.annee);
        $('article#film' + i + ' p.author em').html(value.author);
        $('article#film' + i + ' a.btn-vote').attr('href', 'assets/php/addvote.php?id=' + value.id);
        $('article#film' + i + ' a.btn-share').attr('href', 'assets/php/addvote.php?id=' + value.id).data({
            'image':value.image,
            'title':"J'ai voté pour "+value.title
        });
    });
}

$(document).ready(function () {
    randFilms();

    $('a#others').click(function (event) {
        event.preventDefault();
        randFilms();
    });

    $('a.btn-vote').click(function(event){
        event.preventDefault();
        var href=$(this).attr('href');
        voteFor(href);
    })

    $('.btn-share').click(function(event){
        event.preventDefault();
        elem = $(this);
        postToFeed(elem.data('title'), elem.attr('href'), elem.data('image'));
    });

    // Blur switch
    /*$(function() {
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
    }*/
});

//# sourceMappingURL=script.js.map
