<?php
	ini_set('display_errors', 1);  error_reporting(E_ALL);
    session_start();
	if(!isset($_SESSION['fb_token'])){
		header('location:../../index');
	}
	var_dump($_GET);
	include('newPDO.php');
	$maBD = connexionBD();
	$requExec = 'UPDATE VO_films SET vote = vote + 1 WHERE id ='.$_GET['id'];
	$requete = $maBD->prepare($requExec);
	$ok = $requete->execute();
	if($ok == 1){
		header('location:../../vote');
	}else{
		echo 'Bien joué vous avez tout fait bugguer!!!';
	}
?>