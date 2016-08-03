<?php
    ini_set('display_errors', 1);  error_reporting(E_ALL);
    session_start();
    if(!isset($_SESSION['fb_token'])){
        // Si l'utilisateur accede a cette page sans etre connecté par facebook, on le renvoie sur la page d'accueil
        // header('location:./index');
    }
    require_once('assets/php/header.php');
?>
	<section class="vote">
        <div class="headings">
            <h1>Votez pour votre favori</h1>
            <h2>Aucune réponse n'est mauvaise !</h2>
        </div>
        <article id="film1" class="film-vote">
            <div class="content">
                <h3>"[Nom de mon film 1]"</h3>
                <p class="author"><em>[Prénom] [Nom]</em></p>
                <p class="date">[Date]</p>
                <a href="#" class="vote plus"><i class="fa fa-check"></i> Voter</a>
                <!--<a href="#" class="vote moins">Je vote -</a>-->
                <a href="#" class="vote share" id="sh-f1-plus"><i class="fa fa-facebook"></i>Voter et partager</a>
                <!--<a href="#" class="vote moins" id="sh-f1-moins">Je vote -</a>-->
                <a href="#" id="others">Passer <i class="fa fa-arrow-right"></i></a>
            </div>
            <div class="overlay"></div>
        </article>
        <article id="film2" class="film-vote">
            <div class="content">
                <h3>"[Nom de mon film 2]"</h3>
                <p class="author"><em>[Prénom] [Nom]</em></p>
                <p class="date">[Date]</p>
                <a href="#" class="vote plus"><i class="fa fa-check"></i> Voter</a>
                <!--<a href="#" class="vote moins">Je vote -</a>-->
                <a href="#" class="vote share" id="sh-f2-plus">Voter et partager</a>
                <!--<a href="#" class="vote moins" id="sh-f2-moins">Je vote -</a>-->
                <a href="#" id="others">Passer <i class="fa fa-arrow-right"></i></a>
            </div>
            <div class="overlay"></div>
        <!-- petite precision sur les id des liens : f1 = film 1 et sh pour le bouton share : celui qu'on implémentera avec facebook! -->
        <!-- seconde precision : le contenu se fera en ajax donc dynamiquement (process : chercher base de donnée 2 films randoms et les afficher) -->
    </section>
    
    <script type="text/javascript" src="assets/js/vote.js"></script>
    
<?php require_once('assets/php/footer.php'); ?>