<?php
    ini_set('display_errors', 1);  error_reporting(E_ALL);
    session_start();
    if(!isset($_SESSION['fb_token'])){
        // Si l'utilisateur accède a cette page sans etre connecté via facebook, on le renvoie sur la page d'accueil
        // header('location:./index');
    }
	require_once('assets/php/includes/header.php');
    date_default_timezone_set('UTC');
?>
	<!-- Il faudrait rajouter un formulaire de recherche pour voir si le film que l'on souhaite ajouter n'est pas déjà en ligne en ajax -->
	<div class="add-container grey-section">
        <h1>Ajoutez un film !</h1>
        <div class="content-lg">
            <form id="search" class="form-search-film" action="" method="POST">
                <div class="input-container">
                    <input type="text" id="searchtitle" name="searchtitle" />
                    <label for="searchtitle">Quel film recherchez-vous ?</label>
                </div>
                <div class="input-submit">
                    <input type="submit" value="Rechercher" class="btn-secondary" />
                </div>
                <ul id="results" class="search-title-results">
                    <li>Coucou</li>
                    <li>Coucou 2</li>
                </ul>
            </form>
            <form id="formadd" class="form-add-film" action="assets/php/manage.php" method="post" enctype="multipart/form-data">
                <div class="input-container invalid-input">
                    <input type="text" id="title" name="title" />
                    <label for="title">Titre du film</label>
                </div>
                <div class="input-container valid-input">
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
                <div class="input-submit">
                    <input type="submit" value="Ajouter" class="btn-secondary"/>
                </div>
                <ul id="error-messages" class="errors">
                    <li class="error">Tous les champs sont obligatoires.</li>
                </ul>
            </form>
        </div>
    </div>
       
    <!-- A l'envoi du formulaire on fait une recherche dans la base de donnée pour voir s'il n'existe pas un film avec le meme nom et la meme année -->
    <script type="text/javascript" src="assets/js/ajout.js"></script>
    
<?php require_once('assets/php/includes/footer.php'); ?>