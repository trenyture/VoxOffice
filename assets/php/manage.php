<?php
	if($_POST['title'] != '' && $_POST['year']!='' && $_POST['shortdesc']!='' && isset($_FILES) && isset($_POST)){
		var_dump($_POST);
		var_dump($_FILES);
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
		// Vérifie qu'il s'agit bien d'une image et non d'un virus ou quoi que ce soit d'autre
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        $uploadOk = 1;
		    } else {
		        $uploadOk = 0;
		    }
		}
		// Regarge s'il existe déjà une image ainsi
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Vérifie la taille de l'image
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Regarde le format car on ne veut pas de psd, de tiff, de bnp ... ou je ne sais quoi d'autre
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// On vérifie qu'il n'y a pas d'erreurs : $uploadOK == 0 
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// Si tout es ok on essaie d'upploader le fichier sinon il y a eu une erreur
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
	}else{
		echo "Vous devez remplir tous les champs et l'image est obligatoire!!!";
		echo "<a href='../../add'>Retour</a>";
	}
?>