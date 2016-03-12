<?php
    ini_set('display_errors', 1);  error_reporting(E_ALL);
    session_start();
    include('newPDO.php');
	$message="";
	if($_POST['title'] != '' && $_POST['year']!='' && $_POST['shortdesc']!='' && isset($_FILES) && isset($_POST)){
		/*Code php d'upload de l'image d'apres : http://www.w3schools.com/php/php_file_upload.asp */
		$target_dir = "../img/films/";
		/*On recupere le titre de l'image en lowercase et on le split pour supprimer les espaces et les appostrophes*/
		$imgTitle = $_POST['title'];
		$imgTitle = strtolower($imgTitle);
		$imgTitle = str_replace(' ', '', $imgTitle);
		$imgTitle = str_replace("'", '', $imgTitle);
		/*On ajoute au titre l'année ecemple : topgun_1994*/
		$imgTitle.='_'.$_POST['year'];
		/*On ajoute egalement l'extension*/
		switch ($_FILES["fileToUpload"]["type"]) {
			case 'image/jpeg':
				$imgTitle.='.jpg';
				break;
			case 'image/png':
				$imgTitle.='.png';
				break;
			case 'image/gif':
				$imgTitle.='.gif';
				break;
			default:
				$imgTitle.='.jpg';
				break;
		}
		$target_file = $target_dir . $imgTitle;
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		//Vérifie que la description ne dépasse pas 128 caractères!!!!
		if(strlen($_POST['shortdesc']) > 180){
			$uploadOk = 0;
			$message .= "<p>Votre description est beaucoup trop grande, veuillez aller à l'essentiel!</p>";
		}
		// Vérifie qu'il s'agit bien d'une image et non d'un virus ou quoi que ce soit d'autre
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        $uploadOk = 1;
		    } else {
		        $uploadOk = 0;
		        $message .= '<p>Le fichier est invalide, attention!!!</p>';
		    }
		}
		// Regarge s'il existe déjà une image ainsi
		if (file_exists($target_file)) {
		    $message .= "<p>Désolé, un film portant ce nom et à cette date existe déjà.</p>";
		    $uploadOk = 0;
		}
		// Vérifie la taille de l'image
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		    $message .= "<p>Désolé mais votre fichier est trop grand</p>";
		    $uploadOk = 0;
		}
		// Regarde le format car on ne veut pas de psd, de tiff, de bnp ... ou je ne sais quoi d'autre
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    $message .= "<p>Fichier incompatible : Seulement des images en Jpg, Png ou Gif.</p>";
		    $uploadOk = 0;
		}
		// On vérifie qu'il n'y a pas d'erreurs : $uploadOK == 0 
		if ($uploadOk == 0) {
		    $message .= "<p>Votre ajout n'a pas été enregistrée</p>";
			//Si pas télécharger on renvoie sur la page d'ajout	    
			$message .= "<a href='../../add'>Retour</a>"; 
			header( "Refresh:5; url=../../add", true, 303);
		// Si tout es ok on essaie d'upploader le fichier sinon il y a eu une erreur
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		        $maBD = connexionBD();
				// Pour indiquer au serveur que les requêtes seront codées grâce au jeu de caractères utf-8
				$maBD->exec('SET NAMES utf8');
				// Préparation d'une requête.
				$requete = $maBD->prepare("INSERT INTO VO_films (fb_id, title, annee, shortdesc, image) VALUES (?,?,?,?,?)");
				// Exécution de la requête, avec les valeur 3, "premium" et "premiums" pour remplacer les ? 
				$arrayRequest = array($_POST['user'],$_POST['title'],$_POST['year'],$_POST['shortdesc'],$imgTitle);
				$ok = $requete->execute($arrayRequest);
				// Le résultat placé dans $ok vaudra 1 si la requête a pu s'exécuter correctement
				// Création du message indiquant si l'insertion a réussi
				if($ok == true){
					$message .= "<p>Merci, votre ajout a bien était enregistré!</p>";
					$message .= "<a href='../../index'>Retour</a>"; 
					header( "Refresh:5; url=../../index", true, 303);
				}else{
					$message .= "<p>Un problème est survenu lors de l'ajout, veuillez réessayer</p>";
					$message .= "<a href='../../add'>Retour</a>"; 
				}
		    } else {
		        $message .= "<p>Un problème est survenu lors de l'ajout, veuillez réessayer</p>";
				$message .= "<a href='../../add'>Retour</a>"; 
		    }
		}
	}else{
		$message .= "Vous devez remplir tous les champs et l'image est obligatoire!!!";
		$message .= "<a href='../../add'>Retour</a>"; 
		header( "Refresh:5; url=../../add", true, 303);

	}
?>
<html>
<head>
	<meta charset='utf-8' />
	<title>Ajout</title>
</head>
<body>
	<?= $message; ?>
	<p>Vous serez redirigés dans quelques secondes!</p>
</body>
</html>