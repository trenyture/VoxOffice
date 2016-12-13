<?php
    session_start();
	include('newPDO.php');
	if(!isset($_SESSION['fb_token']) && !isset($_GET['id'])){
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
			$requClick = 'UPDATE VO_users SET click = click + 1 WHERE fb_id ='.$_SESSION['fbId'];
			$requ = $maBD->prepare($requClick);
			$ok = $requ->execute();
		}else{
			$error = true;
			$msg = 'Vous avez fait planté la base de donnée';
		}
		$result = array($error, $msg);
		echo json_encode($result);
	}
?>