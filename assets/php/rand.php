<?php
	ini_set('display_errors', 1);  error_reporting(E_ALL);
    session_start();
	if(!isset($_SESSION['fb_token'])){
		header('location:../../index');
	}
	include('newPDO.php');
	$maBD = connexionBD();
	$requExec = 'SELECT * FROM VO_films ORDER BY RAND() LIMIT 2';
	$requete = $maBD->prepare($requExec);
	$ok = $requete->execute() ;
	$markers = $requete->fetchAll(PDO::FETCH_OBJ);
	$result = [];
	foreach ($markers as $mark) {
		$requTest = 'SELECT * FROM VO_favoris WHERE id_film ='.$mark->id.' AND fb_id = '.$_SESSION['fbId'];
		$requete = $maBD->prepare($requTest);
		$ok = $requete->execute();
		$res = $requete->fetchAll(PDO::FETCH_OBJ);
		$test = sizeof($res);
		if ($test == 0) {
			$mark->favori = false;
		}else{
			$mark->favori = true;
		}
	}
	echo json_encode($markers);
?>