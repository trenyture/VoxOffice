<?php 
	require_once('assets/php/header.php'); 
	//require_once('assets/php/header.php'); 
	if(!isset($_SESSION['fb_token'])){
		//Si l'utilisateur accede a cette page sans etre connecté par facebook, on le renvoie sur la page d'accueil
		header('location:./index');
	}
?>
	<!-- Il faudrait rajouter un formulaire de recherche pour voir si le film que l'on souhaite ajouter n'est pas déjà en ligne en ajax-->
	<!-- Dans le formulaire ci dessus il faut checker la date a deux années pres... Genre si on rentre 2013, faut checker 2011 OR 2012 OR 2013 OR 2014 OR 2015 pour éviter les petits malins-->
	<section>
        <h2>Ajoute ton film!</h2>
        <ul id="error-messages"><li>Tous les champs sont obligatoires!</li></ul>
        <form action="assets/php/manage.php" method="post" enctype="multipart/form-data">
        	<input type="hidden" name="user" value="<?= $_SESSION['fbId']; ?>" />
        	<input type="text" id="title" name="title" placeholder="Titre du film" />
        	<input type="number" id="year" min="1800" max="2016" name="year" placeholder="Année de production (AAAA)" />
        	<textarea id="shortdesc" name="shortdesc" placeholder="Courte description du film (180 caractères max)"></textarea>
        	<p id="caractRest">Il vous reste <span id="count">128</span> caractères disponibles</p>
        	<label for"fileToUpload">Affiche du film : </label>
        	<input type="file" name="fileToUpload" id="fileToUpload" />
        	<p>Images en jpg, png ou gif et inférieure à 500kb</p>
        	<input type="submit" value="Ajout" />
        </form>
        <script type="text/javascript" src="assets/js/ajout.js"></script>
        <!--A l'envoi du formulaire on fait une recherche dans la base de donnée pour voir s'il n'existe pas un film avec le meme nom et la meme année-->
    </section>
<?php require_once('assets/php/footer.php'); ?>