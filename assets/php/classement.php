<?php
	ini_set('display_errors', 1);  error_reporting(E_ALL);
    session_start();
	if(!isset($_SESSION['fb_token']) || !isset($_GET['wut'])){
		header('location:../../index');
	}
	include('newPDO.php');
	$maBD = connexionBD();
	if($_GET['wut'] == 'bad'){
		$requExec = 'SELECT * FROM VO_films ORDER BY vote ASC, title ASC LIMIT 10';
	}
	if($_GET['wut'] == 'good'){
		$requExec = 'SELECT * FROM VO_films ORDER BY vote DESC, title ASC LIMIT 10';
	}
	$requete = $maBD->prepare($requExec);
	$ok = $requete->execute() ;
	$markers = $requete->fetchAll(PDO::FETCH_OBJ);
	echo json_encode($markers);
?>