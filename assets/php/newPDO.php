<?php
// Définition des paramètres d'accès à la base de données
define('HOTE', 'simontrcuwbdd.mysql.db') ;
define('NOM_BD', 'simontrcuwbdd') ;
define('UTILISATEUR', 'simontrcuwbdd') ;
define('MOT_DE_PASSE', 'qBqTm92ztFez') ;

function connexionBD()
{
  try{     // Try: on essaie de se connecter à la BD
     $maBD = new PDO('mysql:host='.HOTE.';dbname='.NOM_BD.';charset=utf8', UTILISATEUR,MOT_DE_PASSE);
     $requete = $maBD->prepare('SET NAMES UTF8') ;
     $resultat = $requete->execute() ;
     return $maBD ;   
  }
  catch(Exception $e)
  {     // Catch : sera exécuté si un problème survient (une exception) lors de la tentative définie dans try
        // Des info concernant le problème se trouvent dans la variable $e
    $messageErreur = '<p class="erreur">Echec de la connexion à la base de données';
    $messageErreur .= '<br />Erreur : '.$e->getMessage().'<br />';
    $messageErreur .= 'N° : '.$e->getCode().'</p>';
    echo $messageErreur ;
    //  throw new Exception($messageErreur) ;
      return false;
  }
  
}

 
?>
