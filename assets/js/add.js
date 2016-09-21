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
    /*Vérification Formulaire avant l'envoi*/
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
});