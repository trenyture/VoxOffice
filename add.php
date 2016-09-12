<?php
    ini_set('display_errors', 1);  error_reporting(E_ALL);
    session_start();
    if(!isset($_SESSION['fb_token'])){
        // Si l'utilisateur accede a cette page sans etre connecté par facebook, on le renvoie sur la page d'accueil
        // header('location:./index');
    }
	require_once('assets/php/includes/header.php');
    date_default_timezone_set('UTC');
?>
	<!--Il faudrait rajouter un formulaire de recherche pour voir si le film que l'on souhaite ajouter n'est pas déjà en ligne en ajax-->
	<div class="add-container">
        <h1>Ajoutez un film !</h1>
        <div class="content-lg">
            <form id="search" class="form-search-film" action="" method="POST">
                <div class="input-container">
                    <input type="text" id="searchtitle" name="searchtitle" />
                    <label for="searchtitle">Quel film souhaitez vous ajouter?</label>
                </div>
                <ul id="results"></ul>
            </form>
            <form id="formadd" class="form-add-film" action="assets/php/manage.php" method="post" enctype="multipart/form-data">
                <ul id="error-messages">
                    <li>Tous les champs sont obligatoires.</li>
                </ul>
                <div class="input-container">
                    <input type="text" id="title" name="title" />
                    <label for="title">Titre du film</label>
                </div>
                <div class="input-container">
                    <input type="number" id="year" name="year" min="1800" max="<?php echo date("Y"); ?>" />
                    <label for="year">Année de production (AAAA) :</label>
                </div>
                <div class="input-container">
                    <input type="text" id="author" name="author" />
                    <label for="author">Nom et prénom du réalisateur :</label>
                </div>
                <div class="input-container">
                    <input type="file" id="fileToUpload" name="fileToUpload" />
                    <label for="fileToUpload">Affiche du film :</label>
                    <span>Images en jpg, png ou gif (taille inférieure à 500kb)</span>
                </div>
                <input type="submit" value="Ajouter" />
            </form>
        </div>
    </div>
       
    <!--A l'envoi du formulaire on fait une recherche dans la base de donnée pour voir s'il n'existe pas un film avec le meme nom et la meme année-->
    <script type="text/javascript" src="assets/js/ajout.js"></script>
    
<?php require_once('assets/php/includes/footer.php'); ?>