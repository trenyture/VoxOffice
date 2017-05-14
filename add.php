<?php
    session_start();
    if(!isset($_SESSION['fb_token'])){
        // Si l'utilisateur accède a cette page sans etre connecté via facebook, on le renvoie sur la page d'accueil
        header('location:./index');
    }
	require_once('assets/php/includes/header.php');
    date_default_timezone_set('UTC');

    function saveToBdd($title,$date,$author,$imgTitle){
        $maBD = connexionBD();
        $maBD->exec('SET NAMES utf8');
        $requete = $maBD->prepare("INSERT INTO VO_films (fb_id, title, annee, author, image, vote) VALUES (?,?,?,?,?,?)");
        $user = $_SESSION['fbId'];
        $arrayRequest = array($user,$title,$date,$author,$imgTitle, 0);
        $ok = $requete->execute($arrayRequest);
        if($ok == true){
            $alert = "<p class='confirmation center'>Votre film a bien été ajouté !</p>";
        }else{
            $alert = "<p class='error center'>Un problème est survenu lors de l'ajout, veuillez réessayer.</p>";
        }
        return $alert;
    }

    $first = true;
    $uploadOk = 1;
    $message="Tous les champs sont obligatoires.";
    if ($_POST) {
        $first = false;
        $message="";
        $alert = '';
        if(isset($_POST)){
            if(!isset($_POST['title']) || $_POST['title'] == '' || preg_replace('/\s+/', '', $_POST['title']) == ''){
                $uploadOk = 0;
                $message .= "<li>Vous devez ajouter un titre au film !</li>";
            }else{
                $title = htmlspecialchars($_POST['title']);  
            }
            if(!isset($_POST['year']) || $_POST['year'] == '' || preg_replace('/\s+/', '', $_POST['year']) == ''){
                $uploadOk = 0;
                $message .= "<li>Vous devez ajouter une date de sortie au film !</li>";
            }else{
                $date = htmlspecialchars($_POST['year']);
                $date = preg_replace('/\s+/', '', $date);
            }
            if(!isset($_POST['author']) || $_POST['author'] == '' || preg_replace('/\s+/', '', $_POST['author']) == ''){
                $uploadOk = 0;
                $message .= "<li>Vous devez préciser le réalisateur du film!</li>";
            }else{
                $author = htmlspecialchars($_POST['author']);
            }
            if ($uploadOk == 1) {
                if (isset($_FILES) && !empty($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] <= 0){
                    if ($_FILES['fileToUpload']['size'] <= 16777216){
                        $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                                'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                                'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                                'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                                'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y',  '€'=>'e',  '$'=>'s', '@'=>'a',
                                '/'=>'', '&'=>'', '#'=>'', '%'=>'', '('=>'', ')'=>'', '='=>'', '+'=>'',  '*'=>'',  '^'=>'',   '¨'=>'', '{'=>'', '}'=>'', '´'=>'', '|'=>'', '['=>'', ']'=>'',
                                '!'=>'', '¡'=>'', '.'=>'', ','=>'', '?'=>'', '¿'=>'', '-'=>'', '_'=>'', ';'=>'', '~'=>'', ':'=>'', '"'=>'', "'"=>'', '¬'=>'' );
                        // Je vérifie l'extension présumée du fichier :
                        $ExtPr = explode('.', $_FILES['fileToUpload']['name']);
                        $ExtPr = strtolower(end($ExtPr));
                        if ($ExtPr == 'jpg' || $ExtPr == 'jpeg' || $ExtPr == 'pjpg' || $ExtPr == 'pjpeg' || $ExtPr == 'gif' || $ExtPr == 'png'){
                            $allExts = array('jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'png' => 'image/png', 'gif' => 'image/gif');
                            $allExtsIE = array('jpg' => 'image/pjpg', 'jpeg'=>'image/pjpeg'); // Il fallait une nouvelle fois qu'IE se différencie.
                            $Mim = getimagesize($_FILES['fileToUpload']['tmp_name']);
                            if($Mim['mime'] == $allExts[$ExtPr]  || $Mim['mime'] == $allExtsIE[$ExtPr]){
                                $img_dir = "storage/img_films/";
                                $vign_dir = "storage/vign_films/";
                                // On recupere le titre de l'image en lowercase et on le split pour supprimer les espaces et les appostrophes*/
                                $imgTitle = strtr($title, $unwanted_array);
                                $imgTitle = strtolower($imgTitle);
                                $imgTitle = preg_replace('/\s+/', '', $imgTitle);
                                $imgTitle = str_replace("'", '', $imgTitle);
                                $imgTitle = str_replace('"', '', $imgTitle);
                                $imgTitle.='_'.$date;
                                if (file_exists($img_dir.$imgTitle.'.jpg') || file_exists($img_dir.$imgTitle.'.png') || file_exists($img_dir.$imgTitle.'.gif')){
                                    $alert = "<p class='error'>Désolé, un film portant ce nom et à cette date existe déjà.</p>";
                                    $uploadOk = 1;
                                }else{
                                    switch ($Mim['mime']) {
                                        // ### JPG
                                        case 'image/jpeg':
                                        case 'image/pjpg':
                                        case 'image/pjpeg':
                                            // On ajoute au titre l'année exemple : topgun_1994
                                            $imgTitle.='.jpg';
                                            $imageFileType = pathinfo($img_dir,PATHINFO_EXTENSION);
                                            $Dims = getimagesize($_FILES['fileToUpload']['tmp_name']);
                                            //IMG
                                            $nImg = imagecreatefromjpeg($_FILES['fileToUpload']['tmp_name']);
                                            if($Dims[0] > 1200){
                                                $nLar = 1000;
                                            }else{
                                                $nLar = $Dims[0];
                                            }
                                            $Red = (($nLar * 100)/$Dims[0]);
                                            $nHaut = (($Dims[1] * $Red)/100);
                                            $NImage = imagecreatetruecolor($nLar , $nHaut) or die ("Erreur");
                                            imagecopyresampled($NImage , $nImg, 0, 0, 0, 0, $nLar, $nHaut, $Dims[0],$Dims[1]);
                                            $tImg = imagejpeg($NImage , $img_dir.$imgTitle, 80);
                                            // VIGNETTE
                                            $nVign = imagecreatefromjpeg($_FILES['fileToUpload']['tmp_name']);
                                            if ($Dims[0] > 200) {
                                                $vLar = 150;
                                            }else{
                                                $vLar = $Dims[0];
                                            }
                                            $vRed = (($vLar * 100)/$Dims[0]);
                                            $vHaut = (($Dims[1] * $vRed)/100);
                                            $NVign = imagecreatetruecolor($vLar , $vHaut) or die ("Erreur");
                                            imagecopyresampled($NVign , $nImg, 0, 0, 0, 0, $vLar, $vHaut, $Dims[0],$Dims[1]);
                                            $tVign = imagejpeg($NVign , $vign_dir.$imgTitle, 50);
                                            if ($tImg && $tVign) {
                                                imagedestroy($nImg);
                                                $alert = saveToBdd($title,$date,$author,$imgTitle);
                                                $uploadOk = 1;
                                            }else{
                                                $uploadOk = 0;
                                                $message .= "<li>Il y a eu un problème lors de l'enregistrement de l'image.</li>";
                                            }
                                            break;
                                        // ### PNG (BUG)
                                        case 'image/png':
                                            $imgTitle.='.png';
                                            $imageFileType = pathinfo($img_dir,PATHINFO_EXTENSION);
                                            $Dims = getimagesize($_FILES['fileToUpload']['tmp_name']);
                                            //IMG
                                            $nImg = imagecreatefrompng($_FILES['fileToUpload']['tmp_name']);
                                            if($Dims[0] > 1200){
                                                $nLar = 1000;
                                            }else{
                                                $nLar = $Dims[0];
                                            }
                                            $Red = (($nLar * 100)/$Dims[0]);
                                            $nHaut = (($Dims[1] * $Red)/100);
                                            $NImage = imagecreatetruecolor($nLar , $nHaut) or die ("Erreur");
                                            imagecopyresampled($NImage , $nImg, 0, 0, 0, 0, $nLar, $nHaut, $Dims[0],$Dims[1]);
                                            $tImg = imagepng($NImage , $img_dir.$imgTitle, 9);
                                            // VIGNETTE
                                            $nVign = imagecreatefrompng($_FILES['fileToUpload']['tmp_name']);
                                            if ($Dims[0] > 200) {
                                                $vLar = 150;
                                            }else{
                                                $vLar = $Dims[0];
                                            }
                                            $vRed = (($vLar * 100)/$Dims[0]);
                                            $vHaut = (($Dims[1] * $vRed)/100);
                                            $NVign = imagecreatetruecolor($vLar , $vHaut) or die ("Erreur");
                                            imagecopyresampled($NVign , $nImg, 0, 0, 0, 0, $vLar, $vHaut, $Dims[0],$Dims[1]);
                                            $tVign = imagepng($NVign , $vign_dir.$imgTitle, 5);
                                            if ($tImg && $tVign) {
                                                imagedestroy($nImg);
                                                $alert = saveToBdd($title,$date,$author,$imgTitle);
                                                $uploadOk = 1;
                                            }else{
                                                $uploadOk = 0;
                                                $message .= "<li>Il y a eu un problème lors de l'enregistrement de l'image.</li>";
                                            }
                                            break;
                                        // ### GIF
                                        case 'image/gif':
                                            $imgTitle.='.gif';
                                            $imageFileType = pathinfo($img_dir,PATHINFO_EXTENSION);
                                            $Dims = getimagesize($_FILES['fileToUpload']['tmp_name']);
                                            //IMG
                                            $nImg = imagecreatefromgif($_FILES['fileToUpload']['tmp_name']);
                                            if($Dims[0] > 1200){
                                                $nLar = 1000;
                                            }else{
                                                $nLar = $Dims[0];
                                            }
                                            $Red = (($nLar * 100)/$Dims[0]);
                                            $nHaut = (($Dims[1] * $Red)/100);
                                            $NImage = imagecreatetruecolor($nLar , $nHaut) or die ("Erreur");
                                            imagecopyresampled($NImage , $nImg, 0, 0, 0, 0, $nLar, $nHaut, $Dims[0],$Dims[1]);
                                            $tImg = imagegif($NImage , $img_dir.$imgTitle);
                                            // VIGNETTE
                                            $nVign = imagecreatefromgif($_FILES['fileToUpload']['tmp_name']);
                                            if ($Dims[0] > 200) {
                                                $vLar = 150;
                                            }else{
                                                $vLar = $Dims[0];
                                            }
                                            $vRed = (($vLar * 100)/$Dims[0]);
                                            $vHaut = (($Dims[1] * $vRed)/100);
                                            $NVign = imagecreatetruecolor($vLar , $vHaut) or die ("Erreur");
                                            imagecopyresampled($NVign , $nImg, 0, 0, 0, 0, $vLar, $vHaut, $Dims[0],$Dims[1]);
                                            $tVign = imagegif($NVign , $vign_dir.$imgTitle);
                                            if ($tImg && $tVign) {
                                                imagedestroy($nImg);
                                                $alert = saveToBdd($title,$date,$author,$imgTitle);
                                                $uploadOk = 1;
                                            }else{
                                                $uploadOk = 0;
                                                $message .= "<li>Il y a eu un problème lors de l'enregistrement de l'image.</li>";
                                            }
                                            break;
                                        default:
                                            $uploadOk = 0;
                                            $message .= "<li>Votre fichier est invalide... Seulement des images en JPG, PNG ou GIF !</li>";
                                            break;
                                    }
                                }
                            }else{
                                $uploadOk = 0;
                                $message .= "<li>Votre fichier est invalide... Seulement des images en JPG, PNG ou GIF !</li>";
                            }
                        }else{
                            $uploadOk = 0;
                            $message .= "<li>Votre fichier est invalide... Seulement des images en JPG, PNG ou GIF !</li>";
                        }
                    }else{
                        $uploadOk = 0;
                        $message .= "<li>Désolé, mais votre fichier est trop grand.</li>";
                    }
                }else{
                    $uploadOk = 0;
                    $message .= "<li>Vous devez importer une image !</li>";
                }
            }
        }
    }
?>

<div class="add-container grey-section">
    <h1>Ajoutez un film !</h1>
    <div class="content-lg">
        <form id="search" class="form-search-film <?php if(!$uploadOk){echo'hidden';}?>" action="" method="POST">
            <?php echo $alert; ?>
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
        <form id="formadd" class="form-add-film <?php if($uploadOk){echo'hidden';}?>" method="post" enctype="multipart/form-data">
            <ul id="error-messages" class="errors">
                <?php echo $message; ?>
            </ul>
            <div class="input-container">
                <input type="text" required id="title" name="title" maxlength="50" <?php if(!$uploadOk && !$first){echo'value="'.$_POST['title'].'"';}?> autofocus required />
                <label for="title">Titre du film</label>
            </div>
            <div class="input-container">
                <input type="number" required id="year" name="year" min="1800" max="<?php echo date("Y"); ?>" <?php if(!$uploadOk && !$first){echo'value="'.$_POST['year'].'"';}?> required />
                <label for="year">Année de production (AAAA)</label>
            </div>
            <div class="input-container">
                <input type="text" required id="author" name="author" maxlength="50" <?php if(!$uploadOk && !$first){echo'value="'.$_POST['author'].'"';}?> required />
                <label for="author">Nom et prénom du réalisateur</label>
            </div>
            <div class="input-container">
                <input type="file" id="fileToUpload" name="fileToUpload" required />
                <label for="fileToUpload">Affiche du film :</label>
                <span>Images en jpg, png ou gif (taille inférieure à 1.5Mb)</span>
            </div>
            <div class="input-submit center">
                <button type="submit" class="btn-secondary"><i class="fa fa-plus"></i> Ajouter</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="assets/js/add.js"></script>
    
<?php require_once('assets/php/includes/footer.php'); ?>