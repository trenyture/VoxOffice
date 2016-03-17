<?php 
    ini_set('display_errors', 1);  error_reporting(E_ALL);
    session_start();
    if(!isset($_SESSION['fb_token'])){
        //Si l'utilisateur accede a cette page sans etre connecté par facebook, on le renvoie sur la page d'accueil
        header('location:./index');
    }
	require_once('assets/php/header.php'); 
    date_default_timezone_set('UTC');
?>
	<!-- Il faudrait rajouter un formulaire de recherche pour voir si le film que l'on souhaite ajouter n'est pas déjà en ligne en ajax-->
	<section>
        <h2>Ajoute ton film!</h2>
        <form id="search" action="" method="POST">
            <input type="text" name="searchtitle" id="searchtitle" placeholder="Quel film souhaitez vous ajouter?" />
            <ul id="results">
            </ul>
        </form>
        <form id="formadd" action="assets/php/manage.php" method="post" enctype="multipart/form-data">
            <ul id="error-messages"><li>Tous les champs sont obligatoires!</li></ul>
        	<input type="text" id="title" name="title" placeholder="Titre du film" />
        	<input type="number" id="year" min="1800" max="<?php echo date("Y"); ?>" name="year" placeholder="Année de production (AAAA)" />
        	<textarea id="shortdesc" name="shortdesc" placeholder="Courte description du film (250 caractères max)"></textarea>
        	<p id="caractRest">Il vous reste <span id="count">250</span> caractères disponibles</p>
        	<label for"fileToUpload">Affiche du film : </label>
        	<input type="file" name="fileToUpload" id="fileToUpload" />
        	<p>Images en jpg, png ou gif et inférieure à 500kb</p>
        	<input type="submit" value="Ajout" />
        </form>
        <script type="text/javascript" src="assets/js/ajout.js"></script>
        <!--A l'envoi du formulaire on fait une recherche dans la base de donnée pour voir s'il n'existe pas un film avec le meme nom et la meme année-->
    </section>
<?php require_once('assets/php/footer.php'); ?>