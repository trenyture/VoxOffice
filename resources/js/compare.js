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
