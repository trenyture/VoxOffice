<?php 
	require_once('assets/php/header.php'); 
	//require_once('assets/php/header.php'); 
	if(!isset($_SESSION['fb_token'])){
		//Si l'utilisateur accede a cette page sans etre connecté par facebook, on le renvoie sur la page d'accueil
		header('location:./index');
	}
?>
	<section>
        <h2>Quel est ton favori?</h2>
        <article id="film1" style="background:url(/assets/img/films/film1.jpg) no-repeat; background-size:cover;">
        	<h3>Titre film 1</h3>
        	<p>Shortdescription (180 caracteres maximum!!!)</p>
        	<a href="#" id="f1-plus">Je vote +</a>
        	<a href="#" id="f1-moins">Je vote -</a>
        	<span>Share
        		<a href="#" id="sh-f1-plus">Je vote +</a>
        		<a href="#" id="sh-f1-moins">Je vote -</a>
        	</span>
        </article>
        <a href="#">Autres films</a>
        <article id="film2" style="background:url(/assets/img/films/film2.jpg) no-repeat; background-size:cover;">
        	<h3>Titre film 2</h3>
        	<p>Shortdescription (180 caracteres maximum!!!)</p>
        	<a href="#" id="f1-plus">Je vote +</a>
        	<a href="#" id="f1-moins">Je vote -</a>
        	<span>Share
        		<a href="#" id="sh-f2-plus">Je vote +</a>
        		<a href="#" id="sh-f2-moins">Je vote -</a>
        	</span>
        </article>
        <!-- petite precision sur les id des liens : f1 = film 1 et sh pour le bouton share : celui qu'on implémentera avec facebook! -->
        <!-- seconde precision : le contenu se fera en ajax donc dynamiquement (process : chercher base de donnée 2 films randoms et les afficher) -->
    </section>
<?php require_once('assets/php/footer.php'); ?>