<?php 
    ini_set('display_errors', 1);  error_reporting(E_ALL);
    session_start();
    if(!isset($_SESSION['fb_token'])){
        //Si l'utilisateur accede a cette page sans etre connecté par facebook, on le renvoie sur la page d'accueil
        header('location:./index');
    }
	require_once('assets/php/header.php'); 
?>
	<section>
        <h2>Quel est ton favori?</h2>
        <article id="film1">
        	<h3></h3>
        	<p></p>
        	<a href="#" class="vote plus">Je vote +</a>
        	<a href="#" class="vote moins">Je vote -</a>
        	<span>Share
        		<a href="#" class="vote plus" id="sh-f1-plus">Je vote +</a>
        		<a href="#" class="vote moins" id="sh-f1-moins">Je vote -</a>
        	</span>
        </article>
        <a href="#" id="others">Autres films</a>
        <article id="film2">
        	<h3></h3>
        	<p></p>
        	<a href="#" class="vote plus">Je vote +</a>
        	<a href="#" class="vote moins">Je vote -</a>
        	<span>Share
        		<a href="#" class="vote plus" id="sh-f2-plus">Je vote +</a>
        		<a href="#" class="vote moins" id="sh-f2-moins">Je vote -</a>
        	</span>
        </article>
        <!-- petite precision sur les id des liens : f1 = film 1 et sh pour le bouton share : celui qu'on implémentera avec facebook! -->
        <!-- seconde precision : le contenu se fera en ajax donc dynamiquement (process : chercher base de donnée 2 films randoms et les afficher) -->
    </section>
    <script type="text/javascript" src="assets/js/vote.js"></script>
<?php require_once('assets/php/footer.php'); ?>