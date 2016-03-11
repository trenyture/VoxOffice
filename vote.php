<?php require_once('assets/php/header.php'); ?>
	<section class="home-intro">
        <div class="intro-content">
            <h1><a href="#" title="VoxOffice - Accueil">Vox<span>Office</span></a></h1>
            <p class="subtitle">Tous vos films favoris. Classés.</p>
            <?php if(isset($_SESSION['fb_token'])){ ?>
                <a href="vote.php" class="btn btn-square">Go!</a>
            <?php }else{ ?>
                <a href="<?= $fbUrlConnect ?>" class="btn btn-square">Go!</a>
            <?php } ?>
        </div>
        <a href="#home-description"><span class="icon icon-scroll"></span></a>
    </section>
    <p>La page de votes...</p>
<?php require_once('assets/php/footer.php'); ?>