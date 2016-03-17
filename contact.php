<?php 
    ini_set('display_errors', 1);  error_reporting(E_ALL);
    session_start();
    require_once('assets/php/header.php'); 
?>    
	<section>
		<h2>N'hésite pas à nous contacter!!!</h2>
		<ul id="error-msg"></ul>
		<form method="POST" action="assets/php/formsend.php">
			<input type="email" name="mail" id="mail" placeholder="Ton mail" />
			<select name="sujet" id="sujet">
				<option value="">C'est à quel sujet?</option>
				<option value="Un problème avec un film">Un problème avec un film</option>
				<option value="Demande de partenariat">Demande de partenariat</option>
				<option value="Juste un petit coucou">Juste un petit coucou</option>
				<option value="Autre">Autre</option>
			</select>
			<textarea name="message" id="message" placeholder="Vas y tu peux développer"></textarea>
			<input type="submit" value="Envoyer" />
		</form>
	</section>
	<script type="text/javascript" src="assets/js/contact.js"></script>
<?php require_once('assets/php/footer.php'); ?>