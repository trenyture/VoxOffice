<?php
	ini_set('display_errors', 1);  error_reporting(E_ALL);
    session_start();
	if(!isset($_SESSION['fb_token'])){
		header('location:../../index');
	}
	include('newPDO.php');
	$maBD = connexionBD();
	$requExec = 'SELECT title, annee FROM VO_films WHERE title LIKE "%'.$_GET['search'].'%"';
	$requete = $maBD->prepare($requExec);
	$ok = $requete->execute();
	$markers = $requete->fetchAll(PDO::FETCH_OBJ);
	echo json_encode($markers);
?>