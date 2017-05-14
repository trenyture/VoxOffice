function takeResult(i) {
    $.ajax({
        url: './assets/php/classement.php?how=' + i,
        dataType: 'json',
        success: function (data) {
            constructDatas(data, i);
            if (data['good'].length < 5) {
                $('#seemore').remove();
            }
        }
    });
}

function constructDatas(films, how) {
    var i = (parseInt(how) * 5) + 1,
        i2 = i,
        ulLi = '';
    $bons = $(films['good']);
    $bons.each(function () {
        var classed = 'item' + this.id;
        ulLi += '<li>';
        ulLi += '<span>' + i + '.</span><a onclick="addFav(this)" data-id="' + this.id + '" class="wishlist item-' + this.id + '">';
        if (this.favori == true || this.favori == 'true') {
            ulLi += '<i class="fa fa-heart yet"></i>';
        } else {
            ulLi += '<i class="fa fa-heart-o"></i>';
        }
        ulLi += '</a><div class="img-film" style="background-image:url(storage/vign_films/' + this.image + ');"></div>';
        ulLi += '<div class="text-container">';
        ulLi += '<h3>' + this.title + '</h3>';
        ulLi += '<h4>' + this.annee + ' - ' + this.author + '</h4>';
        ulLi += '<div class="score"><p>' + this.vote + '</p></div>'
        ulLi += '</li>';
        i = i + 1;
    });
    $('section#best ul').append(ulLi);
    ulLi = '';
    $mals = $(films['bads']);
    $mals.each(function () {
        ulLi += '<li>';
        ulLi += '<span>' + i2 + '.</span><a onclick="addFav(this)" data-id="' + this.id + '" class="wishlist item-' + this.id + '">';
        if (this.favori == true || this.favori == 'true') {
            ulLi += '<i class="fa fa-heart yet"></i>';
        } else {
            ulLi += '<i class="fa fa-heart-o"></i>';
        }
        ulLi += '</a><div class="img-film" style="background-image:url(storage/vign_films/' + this.image + ');"></div>';
        ulLi += '<div class="text-container">';
        ulLi += '<h3>' + this.title + '</h3>';
        ulLi += '<h4>' + this.annee + ' - ' + this.author + '</h4>';
        ulLi += '<div class="score"><p>' + this.vote + '</p></div>'
        ulLi += '</li>';
        i2 = i2 + 1;
    });
    $('section#worst ul').append(ulLi);
}

function addFav(it) {
    var id = $(it).attr('data-id');
    $.ajax({
        url: 'assets/php/addfav.php?film_id=' + id,
        dataType: 'json',
        success: function (result) {
            $('a.wishlist.item-' + id).each(function () {
                if ($(this).children('i').hasClass('fa-heart-o')) {
                    $(this).children('i').removeClass('fa-heart-o').addClass('fa-heart');
                } else {
                    $(this).children('i').removeClass('fa-heart').addClass('fa-heart-o');
                }
            })
        }
    });
    return false;
}

$(document).ready(function () {
    it = 0;
    takeResult(it);
    it++;

    // See More button
    $('#seemore').click(function () {
        takeResult(it);
        it++;
        return false;
    });
});