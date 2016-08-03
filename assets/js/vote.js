/*String.prototype.decode = function(encoding) {
    var result = "";
 
    var index = 0;
    var c = c1 = c2 = 0;
 
    while(index < this.length) {
        c = this.charCodeAt(index);
 
        if(c < 128) {
            result += String.fromCharCode(c);
            index++;
        }
        else if((c > 191) && (c < 224)) {
            c2 = this.charCodeAt(index + 1);
            result += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
            index += 2;
        }
        else {
            c2 = this.charCodeAt(index + 1);
            c3 = this.charCodeAt(index + 2);
            result += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
            index += 3;
        }
    }
    return result;
};*/

$(document).ready(function () {
    $('a#others').click(function (event) {
        event.preventDefault();
        location.reload();
    });
    $.ajax({
        url: './assets/php/rand.php',
        dataType: 'json',
        success: function (data) {
            constructPage(data);
        }
    });
});

function constructPage(films) {
    console.log(films);
    var i = 1;
    $films = $(films);
    $films.each(function () {
        console.log($('article#film' + i));
        $('article#film' + i).css({
            'background-image': 'url(assets/img/films/' + this.image + ')'
        });
        $('article#film' + i + ' h3').html(this.title + '<br/><span>' + this.annee + '</span>');
        $('article#film' + i + ' p').html(this.shortdesc);
        $('article#film' + i + ' a.plus').attr('href', 'assets/php/addvote.php?type=plus&id=' + this.id);
        $('article#film' + i + ' a.moins').attr('href', 'assets/php/addvote.php?type=moins&id=' + this.id);
        i = i + 1;
    });
}