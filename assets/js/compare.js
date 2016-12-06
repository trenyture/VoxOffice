$(document).ready(function () {
    $.ajax({
        url: './assets/php/classement.php?wut=good',
        dataType: 'json',
        success: function (data) {
            constructGood(data);
        }
    }).done(function(){
        $.ajax({
            url: './assets/php/classement.php?wut=bad',
            dataType: 'json',
            success: function (data) {
                constructBad(data);
            }
        }).done(function(){
            displayedLis();
        });
    });
    $('#seemore').click(displayedLis);
    
    // Wishlist items
    $('.wishlist').on('click', function() {
        if ($(this).hasClass('fa-heart-o')) {
            $(this).removeClass('fa-heart-o').addClass('wishlisted fa-heart');
        } else {
            $(this).removeClass('wishlisted fa-heart').addClass('fa-heart-o');
        }
        
        return false;
    });
});

function displayedLis(){
    $('section#worst ul li.hidden').each(function(key){
        if(key<5){
            $(this).addClass('toRemoveClass');
        }else{
            return false;
        }
    });
    $('section#best ul li.hidden').each(function(key){
        if(key<5){
            $(this).addClass('toRemoveClass');
        }else{
            return false;
        }
    });
    $('section ul li.toRemoveClass').each(function(){
        $(this).removeClass();
    });
    if($('section#worst ul li.hidden').length < 1 && $('section#best ul li.hidden').length < 1){
        $('#seemore').css('visibility','hidden');
    }
    return false;
}

function constructBad(films) {
    var i = 1;
    var ulLi = '';
    $films = $(films);
    $films.each(function () {
        ulLi += '<li class="hidden">';
        ulLi += '<span>'+i+'.</span>'
        ulLi += '<i class="fa fa-heart wishlist wishlisted"></i>';
        ulLi += '<div class="img-film" style="background-image:url(assets/img/films/' + this.image + ');"></div>';
        ulLi += '<div class="text-container">';
        ulLi += '<h3>'+this.title+'</h3>';
        ulLi += '<h4>'+this.annee+'</h4>';
        ulLi += '<div class="score"><p>'+this.vote+'</p></div>'
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
        ulLi += '<li class="hidden">';
        ulLi += '<span>'+i+'.</span>'
        ulLi += '<i class="fa fa-heart wishlist wishlisted"></i>';
        ulLi += '<div class="img-film" style="background-image:url(assets/img/films/' + this.image + ');"></div>';
        ulLi += '<div class="text-container">';
        ulLi += '<h3>'+this.title+'</h3>';
        ulLi += '<h4>'+this.annee+'</h4>';
        ulLi += '<div class="score"><p>'+this.vote+'</p></div>'
        ulLi += '</li>';
        i = i + 1;
    });
    $('section#best ul').html(ulLi);
}