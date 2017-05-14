<?php
    require('/home/simontrcrd/globals.php');
    function connexionBD() {
        try {
            // 'try' trying to connect de database
            $maBD = new PDO('mysql:host='.HOTE.';dbname='.NOM_BD.';charset=utf8', UTILISATEUR,MOT_DE_PASSE);
            $requete = $maBD->prepare('SET NAMES UTF8') ;
            $resultat = $requete->execute() ;
            return $maBD;
        }
        catch(Exception $e) {
            // 'catch' will be executed if a problem occurs (exception) during 'try'
            // Infos about the problem are in the var $e
            $messageErreur = '<p class="erreur">Echec de la connexion à la base de données';
            $messageErreur .= '<br />Erreur : '.$e->getMessage().'<br />';
            $messageErreur .= 'N° : '.$e->getCode().'</p>';
            echo $messageErreur ;
            //  throw new Exception($messageErreur) ;
            return false;
        }

    }
?>
