<?php
	ini_set('display_errors', 1);  error_reporting(E_ALL);
    session_start();
	include('newPDO.php');
	if(!isset($_SESSION['fb_token'])){
		header('location:../../index');
	}else{
	    $error;
	    $msg = '';
		$maBD = connexionBD();
		$requExec = 'UPDATE VO_films SET vote = vote + 1 WHERE id ='.$_GET['id'];
		$requete = $maBD->prepare($requExec);
		$ok = $requete->execute();
		if($ok == 1){
			$error = false;
			$msg = '';
		}else{
			$error = true;
			$msg = 'Vous avez fait planté la base de donnée';
		}
		$result = array($error, $msg);
		echo json_encode($result);
	}
?>