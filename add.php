<?php
    session_start();
    if(!isset($_SESSION['fb_token'])){
        // Si l'utilisateur accède a cette page sans etre connecté via facebook, on le renvoie sur la page d'accueil
        // header('location:./index');
    }
	require_once('assets/php/includes/header.php');
    date_default_timezone_set('UTC');
    //////////////////////////////////////////////////////////////////////////////////////////

    if(!isset($_SESSION['fb_token'])){
        header('location:../../index');
    }else{
        $user = $_SESSION['fbId'];
    }
    include('newPDO.php');
    $message="";
    if($_POST['title'] != '' && $_POST['year']!='' && $_POST['author']!='' && isset($_FILES) && isset($_POST)){
        $uploadOk = 1;
        $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );

        /*Code php d'upload de l'image d'apres : http://www.w3schools.com/php/php_file_upload.asp */
        $target_dir = "storage/img_films/";
        /*On recupere le titre de l'image en lowercase et on le split pour supprimer les espaces et les appostrophes*/
        $title = htmlspecialchars($_POST['title']);
        $title = strtr($title, $unwanted_array);
        $imgTitle = $title;
        $imgTitle = strtolower($imgTitle);
        $imgTitle = str_replace(' ', '', $imgTitle);
        $imgTitle = str_replace("'", '', $imgTitle);
        $imgTitle = str_replace('"', '', $imgTitle);
        /*On remplace les espaces dans la date */
        $date = htmlspecialchars($_POST['year']);
        $date = str_replace(' ', '', $date);
        /*On ajoute au titre l'année ecemple : topgun_1994*/
        $imgTitle.='_'.$date;
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
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
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
                $requete = $maBD->prepare("INSERT INTO VO_films (fb_id, title, annee, author, image, vote) VALUES (?,?,?,?,?,?)");
                // Exécution de la requête, avec les valeur 3, "premium" et "premiums" pour remplacer les ?
                //On empeche les possibles hackers d'entrer dans la bdd
                $dbTitle = htmlspecialchars($_POST['title']);
                $dbAuthor = htmlspecialchars($_POST['author']);
                $dbYear = htmlspecialchars($_POST['year']);
                $arrayRequest = array($user,$dbTitle,$dbYear,$dbAuthor,$imgTitle, 0);
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


    //////////////////////////////////////////////////////////////////////////////////////////



?>
	<div class="add-container grey-section">
        <h1>Ajoutez un film !</h1>
        <div class="content-lg">
            <form id="search" class="form-search-film" action="" method="POST">
                <div class="input-container">
                    <input type="text" id="searchtitle" name="searchtitle" maxlength="50" />
                    <label for="searchtitle">Quel film recherchez-vous ?</label>
                </div>
                <div class="results-container">
                    <h2 class="results-number"><big>0</big> résultats :</h2>
                    <ul id="results" class="search-title-results">
                    </ul>
                </div>
                <div class="input-submit center">
                </div>
            </form>
            <form id="formadd" class="form-add-film hidden" method="post" enctype="multipart/form-data">
                <ul id="error-messages" class="errors">
                    <li class="error">Tous les champs sont obligatoires.</li>
                </ul>
                <div class="input-container valid-input">
                    <input type="text" id="title" name="title" maxlength="50" required />
                    <label for="title">Titre du film</label>
                </div>
                <div class="input-container invalid-input">
                    <input type="number" id="year" name="year" min="1800" max="<?php echo date("Y"); ?>" required />
                    <label for="year">Année de production (AAAA)</label>
                </div>
                <div class="input-container">
                    <input type="text" id="author" name="author" maxlength="50" required />
                    <label for="author">Nom et prénom du réalisateur</label>
                </div>
                <div class="input-container ">
                    <input type="file" id="fileToUpload" name="fileToUpload" required />
                    <label for="fileToUpload">Affiche du film :</label>
                    <span>Images en jpg, png ou gif (taille inférieure à 500kb)</span>
                </div>
                <div class="input-submit center">
                    <button type="submit" class="btn-secondary"><i class="fa fa-plus"></i> Ajouter</button>
                </div>
                <p class="confirmation center">Votre film a bien été ajouté !</p>
            </form>
        </div>
    </div>
       
    <script type="text/javascript" src="assets/js/add.js"></script>
    
<?php require_once('assets/php/includes/footer.php'); ?>