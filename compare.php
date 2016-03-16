<?php 
    ini_set('display_errors', 1);  error_reporting(E_ALL);
    session_start();
    if(!isset($_SESSION['fb_token'])){
        //Si l'utilisateur accede a cette page sans etre connecté par facebook, on le renvoie sur la page d'accueil
        header('location:./index');
    }
	require_once('assets/php/header.php'); 
?>
	<section id="best">
        <h2>Les meilleurs films</h2>
        <ul>
        	
        </ul>
    </section>
	<section id="worst">
        <h2>Les pires films</h2>
        <ul>
        	
        </ul>
    </section>
    <script type="text/javascript" src="assets/js/compare.js"></script>
<?php require_once('assets/php/footer.php'); ?>