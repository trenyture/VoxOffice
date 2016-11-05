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