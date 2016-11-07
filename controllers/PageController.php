<?php
/**
 * PageController
 *
 * @package 7agagner
 * @subpackage controllers
 */

use Facebook\FacebookRedirectLoginHelper;

class PageController extends Controller
{
	public function __construct(){
		parent::__construct();
	}

	public function home(){
		$helper = new FacebookRedirectLoginHelper(route(''));
		$fbUrlConnect = $helper->getLoginUrl();
		return view('home', compact('fbUrlConnect'));
	}

	public function add(){
		$helper = new FacebookRedirectLoginHelper(route(''));
		$fbUrlConnect = $helper->getLoginUrl();
		return view('pages/add', compact('fbUrlConnect'));
	}

	public function postAdd(){
		if($_POST['title'] != '' && $_POST['year']!='' && $_POST['author']!='' && isset($_FILES) && isset($_POST)){
			$uploadOk = 1;
			$unwanted_array = array( 'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );

			/*Code php d'upload de l'image d'apres : http://www.w3schools.com/php/php_file_upload.asp */
			$target_dir = './storage/films/';
			/*On recupere le titre de l'image en lowercase et on le split pour supprimer les espaces et les appostrophes*/
			$title = strtr($_POST['title'], $unwanted_array);
			$imgTitle = $title;
			$imgTitle = strtolower($imgTitle);
			$imgTitle = str_replace(' ', '', $imgTitle);
			$imgTitle = str_replace("'", '', $imgTitle);
			/*On ajoute au titre l'année, exemple : topgun_1994*/
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
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Vérifie qu'il s'agit bien d'une image et non d'un virus ou quoi que ce soit d'autre
			if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check !== false) {
					$uploadOk = 1;
				} else {
					$uploadOk = 0;
					$this->setError("Le fichier est invalide, attention!!!");
				}
			}
			// Regarde s'il existe déjà une image ainsi
			if (file_exists($target_file)) {
				$this->setError("Désolé, un film portant ce nom et à cette date existe déjà.");
				$uploadOk = 0;
			}
			// Vérifie la taille de l'image
			if ($_FILES["fileToUpload"]["size"] > 500000) {
				$this->setError("Désolé mais votre fichier est trop grand");
				$uploadOk = 0;
			}
			// Regarde le format car on ne veut pas de psd, de tiff, de bnp ... ou je ne sais quoi d'autre
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				$this->setError("Fichier incompatible : Seulement des images en Jpg, Png ou Gif.");
				$uploadOk = 0;
			}
			// On vérifie qu'il n'y a pas d'erreurs : $uploadOK == 0
			if ($uploadOk == 0) {
				$this->setError("Votre ajout n'a pas été enregistrée");
			// Si tout es ok on essaie d'uploader le fichier sinon il y a eu une erreur
			} else {
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

					$film = new Film();

					//On sanitize les données
					$dbTitle = htmlspecialchars($_POST['title']);
					$dbAuthor = htmlspecialchars($_POST['author']);
					$arrayRequest = array(
						'fb_id' => $_SESSION['fbId'],
						'title' => $dbTitle,
						'annee' => $_POST['year'],
						'author' => $dbAuthor,
						'image' => $imgTitle,
						'vote' => 0
					);
					$ok = $film->addByArray($arrayRequest);
					// Le résultat placé dans $ok vaudra 1 si la requête a pu s'exécuter correctement
					// Création du message indiquant si l'insertion a réussi
					if($ok == true){
						$this->setSuccess("Merci, votre ajout a bien était enregistré!");
					}else{
						$this->setError("Un problème est survenu lors de l'ajout, veuillez réessayer");
					}
				} else {
					$this->setError("Un problème est survenu lors de l'ajout, veuillez réessayer");
				}
			}
		}else{
			$this->setError("Vous devez remplir tous les champs et l'image est obligatoire!!!");
		}
		return view('pages/add');
	}

	public function compare(){
		$helper = new FacebookRedirectLoginHelper(route(''));
		$fbUrlConnect = $helper->getLoginUrl();
		return view('pages/compare', compact('fbUrlConnect'));
	}

	public function contact(){
		$helper = new FacebookRedirectLoginHelper(route(''));
		$fbUrlConnect = $helper->getLoginUrl();
		return view('pages/contact', compact('fbUrlConnect'));
	}

	public function postContact(){
		$from=$_POST['mail'];
		$message=$_POST['message']."\n -- \n".$_SESSION['fbName'];
		$subject=$_POST['sujet'];
		if(mail( 'simon.trichereau@gmail.com', $subject, $message, "From: ".$from."\nReply-to: ".$from."\n" )){
			$this->setSuccess('Votre message a bien été envoyé.');
			return view('pages/contact');
		}else{
			$this->setError("Il y a eu un problème lors de l'envoi, veuillez retenter.");
			return view('pages/contact');
		}
	}

	public function vote(){
		$helper = new FacebookRedirectLoginHelper(route(''));
		$fbUrlConnect = $helper->getLoginUrl();
		$darkened = 1;
		return view('pages/vote', compact('darkened','fbUrlConnect'));
	}
}
