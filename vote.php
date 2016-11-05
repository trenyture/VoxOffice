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
                <p class="author">de <em>[Prénom] [Nom]</em></p>
                <p class="date">[Année]</p>
                <div class="vote-block">
                    <a href="#" class="btn-secondary btn-vote"><i class="fa fa-check"></i> <span>Voter</span></a>
                    <a href="#" class="btn-secondary-transparent btn-share" id="sh-f1" data-image="" data-title=""><i class="fa fa-facebook tablet-hidden"></i><i class="fa fa-share-alt tablet-only"></i> <span>Voter et partager</span></a>
                    <a href="#" class="btn-wishlist"><i class="fa fa-heart-o"></i></a>
                </div>
            </div>
            <div class="overlay"></div>
        </article>
        <article id="film2">
            <div class="article-image" style="background-image: url('assets/img/films/interstellar.jpg');"></div>
            <div class="content">
                <h3>"[Nom de mon film 2]"</h3>
                <p class="author">de <em>[Prénom] [Nom]</em></p>
                <p class="date">[Année]</p>
                <div class="vote-block">
                    <a href="#" class="btn-secondary btn-vote"><i class="fa fa-check"></i> <span>Voter</span></a>
                    <a href="#" class="btn-secondary-transparent btn-share" id="sh-f2" data-image="" data-title=""><i class="fa fa-facebook tablet-hidden"></i><i class="fa fa-share-alt tablet-only"></i> <span>Voter et partager</span></a>
                    <a href="#" class="btn-wishlist"><i class="fa fa-heart-o"></i></a>
                </div>
            </div>
            <div class="overlay"></div>
        </article>
        <a href="#" id="others" class="btn-tertiary skip">Passer <i class="fa fa-arrow-right"></i></a>
    </section>

    <script type="text/javascript" src="assets/js/vote.js"></script>

<?php require_once('assets/php/includes/footer.php'); ?>