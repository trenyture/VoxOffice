<?php
    session_start();
    if (!isset($_SESSION['fb_token'])){
        // If user is not connected via facebook, back to home
        header('location:./index');
    }
    require_once('assets/php/includes/header.php');
    $maBD = connexionBD();
    $maBD->exec('SET NAMES utf8');
    $user = $_SESSION['fbId'];
    $requete = $maBD->prepare("SELECT click FROM VO_users WHERE fb_id = ".$user);
    $ok = $requete->execute();
    $result = $requete->fetch();
    $click = intval($result['click']);
    $request = $maBD->prepare("SELECT id,title,annee,author,image FROM VO_favoris, VO_films WHERE VO_favoris.fb_id = ".$user." AND VO_favoris.id_film = VO_films.id");
    $ok = $request->execute();
    $allFavs = $request->fetchAll(PDO::FETCH_OBJ);

?>

<section class="profile-container grey-section">
    <h1>Votre profil</h1>
    <article id='medals'>
        <h2>Récompenses durement gagnées :</h2>
        <ul>
            <?php
            if ($click >= 10) {
                echo "<li><img src='assets/img/medals/iron-medal.svg' alt='Médaille de Fer - 10 clics' title='Médaille de Fer - 10 clics' /></li>";
            }
            if ($click >= 100) {
                echo "<li><img src='assets/img/medals/bronze-medal.svg' alt='Médaille de Bronze - 100 clics' title='Médaille de Bronze - 100 clics' /></li>";
            }
            if ($click >= 1000) {
                echo "<li><img src='assets/img/medals/silver-medal.svg' alt='Médaille d'Argent - 1 000 clics' title='Médaille d'Argent - 1 000 clics' /></li>";
            }
            if ($click >= 10000) {
                echo "<li><img src='assets/img/medals/gold-medal.svg' alt='Médaille d'Or - 10 000 clics' title='Médaille d'Or - 10 000 clics' /></li>";
            }
            if ($click >= 100000) {
                echo "<li><img src='assets/img/medals/platine-medal.svg' alt='Médaille de Platine - 100 000 clics' title='Médaille de Platine - 100 000 clics' /></li>";
            }
            if ($click >= 1000000) {
                echo "<li><img src='assets/img/medals/unobtainium-medal.svg' alt='Médaille d'Unobtainium - 1 000 000 clics' title='Médaille d'Unobtainium - 1 000 000 clics' /></li>";
            }
        ?>
        </ul>
    </article>
    <article id="favoris">
        <h2>Vos films favoris :</h2>
        <div class="content-lg">
            <nav id="sorting">
                <input type="text" id="search-input" class="search left" name="search" placeholder="Rechercher..." />
                <div class="filters right">
                    <label>Organiser par : </label>
                    <button type="button" class="btn btn-secondary sort" data-sort="title">Titre</button>
                    <button type="button" class="btn btn-secondary sort" data-sort="year">Année</button>
                    <button type="button" class="btn btn-secondary sort" data-sort="real">Réalisateur</button>
                </div>
            </nav>
            <ul class="list">
                <?php foreach ($allFavs as $one) { ?>
                <li>
                    <div class="img-film" style="background-image:url(storage/vign_films/<?= $one->image; ?>);"></div>
                    <div class="text-container">
                        <h3 class="title-fav"><span class="title"><?= $one->title; ?></span></h3>
                        <h4 class="real"><span class="year"><?= $one->annee; ?></span> -
                            <?= $one->author; ?>
                        </h4>
                    </div>
                    <nav class="buttons">
                        <a href="#" data-num="<?= $one->id; ?>" class="btn delete-trash"><i class="fa fa-trash-o"></i></a>
                    </nav>
                </li>
                <?php } ?>
            </ul>
        </div>
    </article>
</section>

<script type="text/javascript" src="assets/js/profile.js"></script>

<?php require_once('assets/php/includes/footer.php'); ?>