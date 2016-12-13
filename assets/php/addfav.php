<?php
    session_start();
	include('newPDO.php');
	if(!isset($_SESSION['fb_token']) && !isset($_GET['film_id'])){
		header('location:../../index');
	}else{
		$error;
	    $msg = '';
		$maBD = connexionBD();
		$requCheck = 'SELECT * FROM VO_favoris WHERE id_film ='.$_GET['film_id'].' AND fb_id = '.$_SESSION['fbId'];
		$check = $maBD->prepare($requCheck);
		$ok = $check->execute();
		if($ok == 1){
			$fav = $check->fetchAll(PDO::FETCH_OBJ);
			$test = sizeof($fav);
			if ($test == 0) {
				$maBD->exec('SET NAMES utf8');
				$requete = $maBD->prepare("INSERT INTO VO_favoris (fb_id, id_film) VALUES (".$_SESSION['fbId'].",".$_GET['film_id'].")");
				$ok2 = $requete->execute();
				if($ok2 == true){
					$error = true;
					$msg = 'Ce film a été ajouté en favoris!';
				}else{
					$error = false;
					$msg = 'Problème avec la base de donnée';
				}
			}else{
				$maBD->exec('SET NAMES utf8');
				$requete = $maBD->prepare("DELETE FROM VO_favoris WHERE fb_id=".$_SESSION['fbId']." AND id_film=".$_GET['film_id']); 
				$ok2 = $requete->execute();
				if($ok2 == true){
					$error = true;
					$msg = 'Ce film a été enlevé de vos favoris!';
				}else{
					$error = false;
					$msg = 'Problème avec la base de donnée';
				}	
			}
		}else{
			$error = false;
			$msg = 'Problème avec la base de donnée';
		}
		$result = array($error, $msg);
		echo json_encode($result);
	}
?>