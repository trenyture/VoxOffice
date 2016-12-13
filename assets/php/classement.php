<?php
	ini_set('display_errors', 1);  error_reporting(E_ALL);
    session_start();
	if(!isset($_SESSION['fb_token'])){
		header('location:../../index');
	}else{
		include('newPDO.php');
		$maBD = connexionBD();
		$how = 0;
		$array = [];
		if (isset($_GET['how'])) {
			$how = intval($_GET['how'])*5;
		}
		$requGood = 'SELECT id,image,title,annee,vote FROM VO_films ORDER BY vote DESC, title ASC LIMIT '.$how.',5';
		$requete = $maBD->prepare($requGood);
		$ok = $requete->execute() ;
		$goods = $requete->fetchAll(PDO::FETCH_OBJ);
		foreach ($goods as $good) {
			$requTest = 'SELECT * FROM VO_favoris WHERE id_film ='.$good->id.' AND fb_id = '.$_SESSION['fbId'];
			$requete = $maBD->prepare($requTest);
			$ok = $requete->execute();
			$res = $requete->fetchAll(PDO::FETCH_OBJ);
			$test = sizeof($res);
			if ($test == 0) {
				$good->favori = false;
			}else{
				$good->favori = true;
			}
		}
		$requBad = 'SELECT id,image,title,annee,vote FROM VO_films ORDER BY vote ASC, title ASC LIMIT '.$how.',5';
		$request = $maBD->prepare($requBad);
		$ok = $request->execute() ;
		$bads = $request->fetchAll(PDO::FETCH_OBJ);
		foreach ($bads as $bad) {
			$requTest = 'SELECT * FROM VO_favoris WHERE id_film ='.$bad->id.' AND fb_id = '.$_SESSION['fbId'];
			$requete = $maBD->prepare($requTest);
			$ok = $requete->execute();
			$res = $requete->fetchAll(PDO::FETCH_OBJ);
			$test = sizeof($res);
			if ($test == 0) {
				$bad->favori = false;
			}else{
				$bad->favori = true;
			}
		}
		$array['good'] = $goods;
		$array['bads'] = $bads;
		echo json_encode($array);
	}
?>