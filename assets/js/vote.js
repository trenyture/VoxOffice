// Share Facebook
window.fbAsyncInit = function () {
    FB.init({
        appId: '898558203596431',
        status: true,
        cookie: true,
        xfbml: true,
        version: 'v2.7'
    });
};

(function (d, debug) {
    var js, id = 'facebook-jssdk',
        ref = d.getElementsByTagName('script')[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement('script');
    js.id = id;
    js.async = true;
    js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
    ref.parentNode.insertBefore(js, ref);
}(document, /*debug*/ false));

function postToFeed(title, url, image, idG, idB) {
    var obj = {
        method: 'feed',
        link: 'http://www.simon-tr.com/projects/VoxOffice/',
        picture: 'http://www.simon-tr.com/projects/VoxOffice/storage/vign_films/' + image,
        name: title,
        description: "Et toi, pour quoi aurais-tu voté?"
    };

    function callback(response) {
        if (response.post_id) {
            voteFor(idG, idB);
        }
    }
    FB.ui(obj, callback);
}

// End SDK Fb
function voteFor(idG, idB) {
    var link = 'assets/php/addvote.php?idG=' + idG + '&idB=' + idB;
    $.ajax({
        url: link,
        success: function (result) {
            if (result) {
                result = eval(result);
                if (!result[0]) {
                    randFilms();
                } else {
                    alert(result[1]);
                }
            } else {
                alert("Vous n'êtes pas connecté!");
            }
        }
    });
}

function randFilms() {
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
    $.each($films, function (key, value) {
        var i = key + 1;
        $('article#film' + i + ' div.article-image').css({
            'background-image': 'url(storage/img_films/' + value.image + ')'
        });
        $('article#film' + i + ' h3').html(value.title);
        $('article#film' + i + ' p.date').html(value.annee);
        $('article#film' + i + ' p.author em').html(value.author);
        $('article#film' + i + ' a.btn-vote').data({
            'theid': value.id
        });
        $('article#film' + i + ' a.btn-share').attr('href', 'assets/php/addvote.php?id=' + value.id).data({
            'theid': value.id,
            'image': value.image,
            'title': "J'ai voté pour " + value.title
        });
        $('article#film' + i + ' a.btn-wishlist').data('theid', value.id);
        if (value.favori == false || value.favori == 'false') {
            $('article#film' + i + ' a.btn-wishlist').removeClass('yet').html();
        } else {
            $('article#film' + i + ' a.btn-wishlist').addClass('yet').html();
        }
    });
}

function addFav(id) {
    $.ajax({
        url: 'assets/php/addfav.php?film_id=' + id,
        dataType: 'json'
    });
}

$(document).ready(function () {
    randFilms();

    $('a#others').click(function (event) {
        randFilms();
        return false;
    });

    $('a.btn-vote').click(function (event) {
        var idG = $(this).data('theid'),
            idB = $(this).closest('article').siblings('article').find('.btn-vote').data('theid');
        voteFor(idG, idB);
        return false;
    })

    $('.btn-share').click(function (event) {
        var idG = $(this).data('theid'),
            idB = $(this).closest('article').siblings('article').find('.btn-share').data('theid');
        elem = $(this);
        postToFeed(elem.data('title'), elem.attr('href'), elem.data('image'), idG, idB);
        return false;
    });

    $('a.btn-wishlist').click(function () {
        addFav($(this).data('theid'));
        $(this).toggleClass('yet');
        return false;
    });

});