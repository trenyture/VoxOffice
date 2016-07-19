function lookingTitle(datas) {
    var liRes = "";
    $data = $(datas);
    $data.each(function () {
        liRes += '<li>';
        liRes += this.title + ' - ' + this.annee;
        liRes += '</li>';
    });
    liRes += "<li><a onclick='changeFormAdd();' href='#'>Votre film n'apparaît pas?</a></li>";
    $('ul#results').html(liRes);
}

function changeFormAdd() {
    $('form#formadd').removeClass('hidden');
    $('form#search').addClass('hidden');
    return false;
}

$(document).ready(function () {
    $('form#search input#searchtitle').keyup(function () {
        //On ne fait la recherche qu'à partir de 3 caractères minimum
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
    $('form#formadd textarea#shortdesc').keyup(function () {
        var caract = 250 - $(this).val().length;
        if (caract < 0) {
            $('form#formadd p#caractRest').css('color', 'red');
        } else {
            $('form#formadd p#caractRest').css('color', 'green');
        }
        $('form#formadd p#caractRest span#count').html(caract);
    });
    /*Vérification Formulaire avant l'envoi*/
    $('form#formadd').submit(function () {
        var okForm = true;
        var messageError = '';
        if ($(this).children('input#title').val() == '') {
            okForm = false;
            messageError += '<li> Vous devez écrire un titre! </li>';
        }
        if ($(this).children('input#year').val() == '') {
            okForm = false;
            messageError += "<li> Vous devez ajouter l'année de production! </li>";
        }
        if ($(this).children('textarea#shortdesc').val() == '') {
            okForm = false;
            messageError += "<li> Vous devez mettre une courte description! </li>";
        }
        if ($(this).children('textarea#shortdesc').val().length > 250) {
            okForm = false;
            messageError += "<li> Vous devez écrire une description plus courte! </li>";
        }
        if ($(this).children('input#fileToUpload').val() == '') {
            okForm = false;
            messageError += "<li> Vous devez ajouter une image! </li>";
        }
        if (okForm == false) {
            $('ul#error-messages').html(messageError);
            return false;
        }
    })
});