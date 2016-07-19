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
            errorMsg += '<li>Vous devez nous donner votre email</li>';
            okSend = false;
        }
        if ($('#mail').val()) {
            var testMail = validateEmail($('#mail').val())
            if (testMail == false) {
                errorMsg += "<li>Un email valide s'il vous plait!!!</li>"
                okSend = false;
            }
        }
        if ($('#sujet').val() == '') {
            errorMsg = "<li>N'oubliez pas le sujet!</li>"
            okSend = false;
        }
        if ($('#message').val() == '') {
            errorMsg = "<li>Veuillez écrire un message!</li>"
            okSend = false;
        }
        if (okSend == false) {
            return false; // Je sais pas si tu sais, mais le return false c'est la nouvelle façon d'écrire event.preventDefault();
            $('ul#error-msg').html(errorMsg);
        }
    });
});