function lookingTitle(datas) {
    var liRes = "";
    $data = $(datas);
    $data.each(function () {
        liRes += '<li>';
        liRes += this.title + ' - ' + this.annee;
        liRes += '</li>';
    });
    $('ul#results').html(liRes);
    $('h2.results-number big').html(datas.length);
    $('form#search div.input-submit').html('<a onclick="changeFormAdd();" class="btn-secondary"><i class="fa fa-plus"></i> Ajouter un film</a>');
}

function changeFormAdd() {
    $('form#formadd input#title').val($('form#search input#searchtitle').val());
    $('form#formadd input#title').first().focus();
    $('form#formadd').removeClass('hidden');
    $('form#search').addClass('hidden');
    document.getElementById('title').focus();
}

$(document).ready(function () {
    $('form#search input#searchtitle').keyup(function () {
        // On ne fait la recherche qu'à partir de 3 caractères minimum
        if ($(this).val().length > 2) {
            var searchKey = $(this).val();
            $.ajax({
                url: 'assets/php/searchtitle.php?search=' + searchKey,
                dataType: 'json',
                success: function (data) {
                    lookingTitle(data);
                }
            });
        }
    });
    $('form#search').submit(function(event){
        changeFormAdd();
        return false;
    });
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
    });
});