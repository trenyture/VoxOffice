<?php
    require('php-sdk-v4/autoload.php');

	use Facebook\FacebookRedirectLoginHelper;
    use Facebook\FacebookSession;
    use Facebook\FacebookRequest;
    use Facebook\GraphUser;

    if (isset($_GET) && isset($_GET['logout']) && $_GET['logout'] == 'true') {
        $_SESSION = null;
        session_destroy();
        header('location:./index');
    }
    //l'utilisateur se connecte avec FB
    if (isset($_GET) && isset($_GET['code'])) {
        header('location:./vote');
    }
    function test_user ($nom, $id){
        $maBD = connexionBD() ;  // Cette fonction est définie dans le dossier helpers
        $texteRequete = ("SELECT * from VO_users WHERE VO_users.fb_id=".$id) ;
        $requete = $maBD->prepare($texteRequete) ;
        $ok = $requete->execute() ;
        // Dans $resultats, on récupère le résultat de la requête,
        // sous la forme d'un tableau d'objets
        $resultats = $requete->fetchAll(PDO::FETCH_OBJ)  ;
        if(sizeof($resultats)==0){
            $requete = $maBD->prepare('INSERT INTO VO_users (fb_id, name) VALUES (?, ?)');
            $ok = $requete->execute(array($id, $nom));
        }
        // Et on envoie ce résultat au programme qui l'a demandé : le controller
    }
    /*FACEBOOK CONNECT*/
    $appId = '898558203596431';
    $appSecret = '16f33b4c7bca662b5b6d286fe9a2642d';

    FacebookSession::setDefaultApplication($appId,$appSecret);
    $helper = new FacebookRedirectLoginHelper(route(''));
    if (isset($_SESSION) && isset($_SESSION['fb_token'])) {
        $session = new FacebookSession($_SESSION['fb_token']);
    }else{
        $session = $helper->getSessionFromRedirect();
    }
    if($session){
        try{
            $_SESSION['fb_token'] = $session->getToken();
            $request = new FacebookRequest($session, 'GET', '/me');
            $profile = $request -> execute() -> getGraphObject();
            $_SESSION['fbName'] = $profile->getProperty('name');
            $_SESSION['fbId'] = $profile->getProperty('id');
            test_user($_SESSION['fbName'],$_SESSION['fbId']);
            $request2 = new FacebookRequest($session, 'GET', '/me/picture?type=large&redirect=false');
            $picture = $request2 -> execute();
            $img = $picture->getGraphObject()->asArray();
            $_SESSION['fbImg'] = $img;
        }catch(Exception $e){
            $_SESSION = null;
            session_destroy();
        }
    }
