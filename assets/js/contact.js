// Legacy mail verification
function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}


$(document).ready(function () {
    // Form verification
    $('form').submit(function (event) {
        var errorMsg = '',
            okSend = true;
        if ($('#mail').val() == '') {
            errorMsg += '<li class="error">Votre email est requis.</li>';
            okSend = false;
        } else {
            if (validateEmail($('#mail').val()) == false) {
                errorMsg += '<li class="error">Veuillez vérifier que votre email soit valide.</li>'
                okSend = false;
            }
        }
        if ($('#sujet').val() == '') {
            errorMsg += '<li class="error">Veuillez renseigner un sujet.</li>'
            okSend = false;
        }
        if ($('#message').val() == '') {
            errorMsg += '<li class="error">Veuillez renseigner votre message.</li>'
            okSend = false;
        }
        if (okSend == false) {
            $('ul#error-messages').html(errorMsg);
            event.preventDefault();
        }
    });
});