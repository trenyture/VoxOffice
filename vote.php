<?php
    ini_set('display_errors', 1);  error_reporting(E_ALL);
    session_start();
    if(!isset($_SESSION['fb_token'])){
        // Si l'utilisateur accede a cette page sans etre connecté par facebook, on le renvoie sur la page d'accueil
        // header('location:./index');
    }
    require_once('assets/php/includes/header.php');
?>
	<section class="vote-container">
        <div class="headings">
            <h1>Votez pour votre favori</h1>
            <h2>Aucune réponse n'est mauvaise !</h2>
        </div>
        <article id="film1">
            <div class="article-image" style="background-image: url('assets/img/films/2001.jpg');"></div>
            <div class="content">
                <h3>"[Nom de mon film 1]"</h3>
                <p class="author"><em>[Prénom] [Nom]</em></p>
                <p class="date">[Année]</p>
                <div class="vote-block">
                    <a href="#" class="btn-secondary btn-plus"><i class="fa fa-check"></i> Voter</a>
                    <a href="#" class="btn-secondary-transparent btn-share" id="sh-f2"><i class="fa fa-facebook"></i>Voter et partager</a>
                </div>
            </div>
            <a href="#" id="others" class="btn-tertiary">Passer <i class="fa fa-arrow-right"></i></a>
            <div class="overlay"></div>
        </article>
        <article id="film2">
            <div class="article-image" style="background-image: url('assets/img/films/interstellar.jpg');"></div>
            <div class="content">
                <h3>"[Nom de mon film 2]"</h3>
                <p class="author"><em>[Prénom] [Nom]</em></p>
                <p class="date">[Année]</p>
                <div class="vote-block">
                    <a href="#" class="btn-secondary btn-plus"><i class="fa fa-check"></i> Voter</a>
                    <a href="#" class="btn-secondary-transparent btn-share" id="sh-f2"><i class="fa fa-facebook"></i>Voter et partager</a>
                </div>
            </div>
            <a href="#" id="others" class="btn-tertiary">Passer <i class="fa fa-arrow-right"></i></a>
            <div class="overlay"></div>
        </article>
    </section>

    <script type="text/javascript" src="assets/js/vote.js"></script>

<?php require_once('assets/php/includes/footer.php'); ?>