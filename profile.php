<?php
    session_start();
    if(!isset($_SESSION['fb_token'])){
        // Si l'utilisateur accede a cette page sans etre connecté par facebook, on le renvoie sur la page d'accueil
        // header('location:./index');
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
            <h2>Récompenses durement gagnées</h2>
            <ul>
                <?php
					if ($click >= 10) {
						echo "<li><img src='assets/img/medals/iron-medal.png' alt='Médaille de Fer - 10 clics' /></li>";
					}
					if ($click >= 100) {
						echo "<li><img src='assets/img/medals/bronze-medal.png' alt='Médaille de Bronze - 100 clics' /></li>";
					}
					if ($click >= 1000) {
						echo "<li><img src='assets/img/medals/silver-medal.png' alt='Médaille d'Argent - 1 000 clics' /></li>";
					}
					if ($click >= 10000) {
						echo "<li><img src='assets/img/medals/gold-medal.png' alt='Médaille d'Or - 10 000 clics' /></li>";
					}
					if ($click >= 100000) {
						echo "<li><img src='assets/img/medals/platine-medal.png' alt='Médaille de Platine - 100 000 clics' /></li>";
					}
					if ($click >= 1000000) {
						echo "<li><img src='assets/img/medals/unobtainium-medal.png' alt='Médaille d'Unobtainium - 1 000 000 clics' /></li>";
					}
				?>
            </ul>
        </article>
        <article id="favoris">
            <h2>Vos films favoris :</h2>
            <div class="content-lg">
                <nav id="sorting">
                    <input class="search" placeholder="Search" />
                    <div class="filters">
                        <label>Organiser par: </label>
                        <button class="sort" data-sort="title">Titre</button>
                        <button class="sort" data-sort="year">Année</button>
                        <button class="sort" data-sort="real">Réalisateur</button>
                    </div>
                </nav>
                <ul class="list">
                    <?php foreach ($allFavs as $one) { ?>
                        <li>
                            <div class="img_film" style="background-image:url(storage/vign_films/<?= $one->image; ?>);"></div>
                            <div class="text-container">
                                <h3 class="title-fav"><span class="title"><?= $one->title; ?></span> - <span class="year"><?= $one->annee; ?></span></h3>
                                <h4 class="real">Réalisé par <?= $one->author; ?></h4>
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