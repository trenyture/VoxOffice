<?php
    session_start();
    require_once('assets/php/includes/header.php');
?>

<section class="home-intro">
    <div class="intro-content">
        <h1><a href="#" title="VoxOffice - Accueil">Vox<span>Office</span></a></h1>
        <p class="subtitle">Tous vos films favoris. Classés.</p>
        <?php if (isset($_SESSION['fb_token'])){ ?>
        <a href="/vote" class="btn-primary">Go!</a>
        <?php } else { ?>
        <a href="<?= $fbUrlConnect ?>" class="btn btn-primary btn-square">Go!</a>
        <?php } ?>
    </div>
    <a href="#home-description"><span class="icon icon-scroll"></span></a>
</section>
<section class="home-description" id="home-description">
    <div class="content-lg">
        <div class="description half">
            <h2>Le concept.</h2>
            <p>VoxOffice est un projet visant la création d'une classification ultra rapide de milliers de films. Pour atteindre cet objectif, <span class="uppercase">Vous</span> êtes le principal acteur, en pouvant <span class="highlighted">voter</span>, <span class="highlighted">ajouter</span> et <span class="highlighted">comparer</span> tous les films que vous voulez.</p>
            <p>Choisissez rapidement parmi deux films proposés, pour créer un top des "meilleurs" et des "pires".</p>
            <p class="bigger">Nous nous chargeons du reste. <br><span>Aussi simple que cela!</span></p>
            <p>Vous pouvez lire la <a href="https://github.com/trenyture/VoxOffice" target="_blank">documentation</a> pour plus d'informations ou sur le <a href="https://github.com/trenyture/VoxOffice" target="_blank">dépôt officiel GitHub</a>.</p>
        </div>
    </div>
</section>
<section class="home-features">
    <div class="content-md">
        <h2>Comment faire</h2>
        <ul>
            <li class="feature feature-vote">
                <div class="feature-content">
                    <h3>Votez.</h3>
                    <p>Le principe de VoxOffice est de voter.</p>
                    <p>Faites votre choix entre deux films pour les faire monter - ou descendre - dans le classement général. D'autres films vous seront proposés aussitôt après.</p>
                    <?php if (isset($_SESSION['fb_token'])) { ?>
                    <a href="/vote" class="btn btn-round" title="Essayer">Essayer</a>
                    <?php } ?>
                </div>
                <div class="feature-img right">
                    <img src="assets/img/vote.svg" alt="Votez" />
                </div>
            </li>
            <li class="feature feature-add">
                <div class="feature-content">
                    <h3>Ajoutez.</h3>
                    <p>Vous pouvez également ajouter vos propres films et enrichir la liste VoxOffice des films référencés. C'est simple, rapide et immédiat !</p>
                    <?php if (isset($_SESSION['fb_token'])) { ?>
                    <a href="/add" class="btn btn-round" title="Essayer">Essayer</a>
                    <?php } ?>
                </div>
                <div class="feature-img left">
                    <img src="assets/img/add.svg" alt="Ajoutez" />
                </div>
            </li>
            <li class="feature feature-compare">
                <div class="feature-content">
                    <h3>Comparez.</h3>
                    <p>Le classement des films vous permet de voir instantanément les plus - ou les moins - populaires !</p>
                    <?php if (isset($_SESSION['fb_token'])){ ?>
                    <a href="/compare" class="btn btn-round" title="Essayer">Essayer</a>
                    <?php } ?>
                </div>
                <div class="feature-img right">
                    <img src="assets/img/compare.svg" alt="Comparez" />
                </div>
            </li>
        </ul>
    </div>
</section>
<section class="home-connect">
    <span class="filter"></span>
    <div class="content-md">
        <h2>Lancez-vous</h2>
        <div class="content-sm">
            <p><small>En vous connectant à Facebook, nous pouvons directement vous aider, vous et vos amis, à trouver les plus grands films !</small></p>
        </div>
        <p class="alert">Ce, sans aucune publicité, tracking, ou notifications intrusives.</p>
        <?php if (isset($_SESSION['fb_token'])) { ?>
        <a href="/vote" title="Connexion à Facebook" class="btn-fb">Connecté !</a>
        <?php } else { ?>
        <a href="<?= $fbUrlConnect ?>" title="Connexion à Facebook" class="btn btn-fb"><i class="fa fa-facebook"></i>Se connecter à Facebook</a>
        <?php } ?>
    </div>
</section>

<?php require_once('assets/php/includes/footer.php'); ?>
