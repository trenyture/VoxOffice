<?php
    
    require_once('assets/php/includes/header.php');
?>
    <div class="contact-container grey-section">
		<h1>N'hésitez pas à nous contacter !</h1>
        <div class="content-lg">
            
            <form method="POST">
                <ul id="error-messages" class="errors">
                    
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
            
            <p class="confirmation center">Merci beaucoup, votre message à bien été envoyé.</p>

        </div>
    </div>
	<script type="text/javascript" src="assets/js/contact.js"></script>

<?php require_once('assets/php/includes/footer.php'); ?>