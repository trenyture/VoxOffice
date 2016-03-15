<?php
	include('newPDO.php');
	$maBD = connexionBD();
	$requExec = 'SELECT * FROM VO_films ORDER BY RAND() LIMIT 2';
	$requete = $maBD->prepare($requExec);
	$ok = $requete->execute() ;
	$markers = $requete->fetchAll(PDO::FETCH_OBJ);
	echo json_encode($markers);
?>