<?php
    ini_set('display_errors', 1);  error_reporting(E_ALL);
    session_start();
    $msg = '';
    $displayForm = true;
    $error = false;
    if ($_POST) {
        if (empty($_POST["mail"]) || $_POST["mail"] == '') {
            $msg .= '<li class="error">Votre email est requis.</li>';
            $error = true;
        }else{
            if (filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL) === false) {
                $msg .= '<li class="error">Veuillez vérifier que votre email soit valide.</li>';
                $error = true;
            }else{
                $mail = htmlspecialchars($_POST["mail"]);
            }
        }
        if (empty($_POST["sujet"]) || $_POST["sujet"] == '') {
            $msg .= '<li class="error">Veuillez renseigner un sujet.</li>';
            $error = true;
        }else{
            $sujet = htmlspecialchars($_POST["sujet"]);
        }
        if (empty($_POST["message"]) || $_POST["message"] == '') {
            $msg .= '<li class="error">Veuillez renseigner votre message.</li>';
            $error = true;
        }else{
            $message = htmlspecialchars($_POST["message"]);
        }
        /*Tout va bien? on envoie le mail*/
        if($error == false){
            $displayForm=false;
            $to  = 'pierre.prezelin01@gmail.com,simon-trichereau@gmail.com';
            /*On remet les paragraphe du message*/
            $message = str_replace("\n",'</p><p style="color:black;">',$message);
            /*On organize un peu le message*/
            $zeMessage = '<html><head><title></title></head><body><p style="color:black;">'.$message.'</p><p style="margin-top:20px;color:#666;">'..'</p><p style="color:#666;">'.$mail.'<br/>'.$sujet.'<br/>Envoyé depuis Vox Office.</p></body></html>';
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            // More headers
            $headers .= 'From: <'.$mail.'>' . "\r\n";
            if(mail($to,$sujet,$zeMessage,$headers)){
                //Mail sent
            }else{
                $displayForm = true;
                $msg = "<li>Il y a eu un problème lors de l'envoi du mail.</li><li>Veuillez rééssayer s'il vous plait.</li>";
            }
        }
    }
    echo 'Test';
    require_once('assets/php/includes/header.php');
?>
    <div class="contact-container grey-section">
		<h1>N'hésitez pas à nous contacter !</h1>
        <div class="content-lg">
            <?php if ($displayForm == true) { ?>
            <form method="POST">
                <ul id="error-messages" class="errors">
                    <?php echo $msg; ?>
                </ul>
                <div class="input-container">
                    <input type="email" name="mail" id="mail" required />
                    <label for="mail">Votre mail</label>
                </div>
                <div class="input-container">
                    <select name="sujet" id="sujet" required>
                        <option value="">--</option>
                        <option value="Un problème avec un film">Problème avec un film</option>
                        <option value="Demande de partenariat">Demande de partenariat</option>
                        <option value="Juste un petit coucou">Juste pour dire bonjour</option>
                        <option value="Autre">Autre</option>
                    </select>
                    <label for="sujet">Sujet de votre message</label>
                </div>
                <div class="input-container">
                    <textarea name="message" id="message" required></textarea>
                    <label for="message">Détails de votre message</label>
                </div>
                <div class="input-submit center">
                    <button type="submit" class="btn-secondary"><i class="fa fa-paper-plane"></i>Envoyer</button>
                </div>
            </form>
            <?php } else { ?>
            <p class="confirmation center">Merci beaucoup, votre message à bien été envoyé.</p>
            <?php } ?>
        </div>
    </div>
	<script type="text/javascript" src="assets/js/contact.js"></script>

<?php require_once('assets/php/includes/footer.php'); ?>