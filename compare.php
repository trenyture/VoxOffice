<?php 
	require_once('assets/php/header.php'); 
	//require_once('assets/php/header.php'); 
	if(!isset($_SESSION['fb_token'])){
		//Si l'utilisateur accede a cette page sans etre connecté par facebook, on le renvoie sur la page d'accueil
		header('location:./index');
	}
?>
	<section>
        <h2>Les meilleurs films</h2>
        <ul>
        	<li>
        		<div class="img-film"></div>
    			<p class="desc-film">1 - Titre film <span>( Année de production )</span></p>
        	</li>
        	<li>
        		<div class="img-film"></div>
    			<p class="desc-film">2 - Titre film <span>( Année de production )</span></p>
        	</li>
        	<li>
        		<div class="img-film"></div>
    			<p class="desc-film">3 - Titre film <span>( Année de production )</span></p>
        	</li>
        </ul>
    </section>
	<section>
        <h2>Les pires films</h2>
        <ul>
        	<li>
        		<div class="img-film"></div>
    			<p class="desc-film">1 - Titre film <span>( Année de production )</span></p>
        	</li>
        	<li>
        		<div class="img-film"></div>
    			<p class="desc-film">2 - Titre film <span>( Année de production )</span></p>
        	</li>
        	<li>
        		<div class="img-film"></div>
    			<p class="desc-film">3 - Titre film <span>( Année de production )</span></p>
        	</li>
        </ul>
    </section>
<?php require_once('assets/php/footer.php'); ?>