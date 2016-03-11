<?php
    ini_set('display_errors', 1);  error_reporting(E_ALL);
    session_start();
    include('assets/php/newPDO.php');
    include('assets/php/fbConnect.php');
    $fbUrlConnect = $helper->getLoginUrl();
    switch ($_SERVER['REQUEST_URI']) {
        case '/VoxOffice/vote.php':
            $bodyId = 'vote';
            break;
        
        default:
            $bodyId = 'home';
            break;
    }
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" lang="fr"><![endif]-->
<!--[if IE 7 ]> <html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" lang="fr"><![endif]-->
<!--[if IE 8 ]> <html class="ie ie8 ie-lt10 ie-lt9 no-js" lang="fr"><![endif]-->
<!--[if IE 9 ]> <html class="ie ie9 ie-lt10 no-js" lang="fr"><![endif]-->
<!--[if gt IE 9]><html class="no-js" lang="fr"><![endif]-->
<html>
    <head>
        <!--Metas -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
        <meta name="author" content="Simon Trichereau - Pierre Prézelin">
        <meta name="description" content="Un site web pour choisir et voter pour le meilleur film!">
        <meta name="keywords" content="Meilleur,Film,Best,Movie,Simon,Trichereau,Pierre,Prezelin,VoxOffice,Voter,Vote,HTML,CSS,JavaScript,jQuery,Facebook,Share,Partage,Php,MySQL,SASS,Compass"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="google-site-verification" content="">-->

        <title>VoxOffice - Tous vos films favoris. Classés.</title>

        <!-- Favicons -->
        <link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicons/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicons/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicons/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicons/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicons/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicons/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicons/apple-touch-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon-180x180.png">
        <link rel="icon" type="image/png" href="assets/img/favicons/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="assets/img/favicons/favicon-194x194.png" sizes="194x194">
        <link rel="icon" type="image/png" href="assets/img/favicons/favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="assets/img/favicons/android-chrome-192x192.png" sizes="192x192">
        <link rel="icon" type="image/png" href="assets/img/favicons/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="assets/img/favicons/manifest.json">
        <link rel="mask-icon" href="assets/img/favicons/safari-pinned-tab.svg" color="#7b6696">
        <link rel="shortcut icon" href="assets/img/favicons/favicon.ico">
        <meta name="msapplication-TileColor" content="#7b6696">
        <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-144x144.png">
        <meta name="msapplication-config" content="assets/img/favicons/browserconfig.xml">
        <meta name="theme-color" content="#7b6696">

        <!-- Stylesheets -->
        <link rel="stylesheet" type="text/css" href="assets/css/styles.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome-4.5.0/css/font-awesome.min.css">
    </head>
    <body class="<?=$bodyId;?>">
        <header>
            <a href="index.php" class="logo">
                <svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 495.6 405" style="enable-background:new 0 0 495.6 405;" xml:space="preserve">
                    <path d="M317.1,125.4c-17.2,0-31.2,14-31.2,31.2c0,6.3,1.9,12.5,5.5,17.7c3.7,6.3,2.7,11.1,1.7,13.6l-32.7,61.5l0,0v0.1
                    l-0.9,1.6c-1.4,2.2-4.8,5.6-11.8,6.3h-0.2c-7-0.6-10.4-4.1-11.8-6.3l-0.9-1.6v-0.1l0,0l-32.7-61.5c-1-2.4-1.9-7.3,1.7-13.6
                    c9.8-14.2,6.2-33.7-8-43.4s-33.7-6.2-43.4,8c-9.8,14.2-6.2,33.7,8,43.4c5.2,3.6,11.4,5.5,17.7,5.5c8,0.3,11.5,4.3,12.8,6.4
                    l33.1,62.4c0.9,2,2.3,6.9-1.4,13.4l0,0c-0.4,0.6-0.9,1.2-1.3,1.8l-0.2,0.3c-0.4,0.6-0.7,1.2-1.1,1.9l-0.2,0.3
                    c-0.3,0.6-0.6,1.2-0.9,1.9l-0.1,0.2c-0.3,0.7-0.5,1.4-0.8,2l-0.1,0.4c-0.2,0.7-0.4,1.4-0.6,2.1l-0.1,0.3c-0.2,0.7-0.3,1.3-0.4,2
                    c0,0.1,0,0.3-0.1,0.4c-0.1,0.7-0.2,1.5-0.3,2.2c0,0.2,0,0.3,0,0.5c-0.1,0.8-0.1,1.5-0.1,2.3c-0.3,17.2,13.4,31.5,30.7,31.8
                    s31.5-13.4,31.8-30.7c0-0.4,0-0.7,0-1.1c0-0.8,0-1.6-0.1-2.3c0-0.2,0-0.3,0-0.5c-0.1-0.7-0.2-1.5-0.3-2.2c0-0.1,0-0.3-0.1-0.4
                    c-0.1-0.7-0.3-1.3-0.4-2l-0.1-0.3c-0.2-0.7-0.4-1.4-0.6-2.1l-0.1-0.4c-0.2-0.7-0.5-1.4-0.8-2l-0.1-0.2c-0.3-0.6-0.6-1.3-0.9-1.9
                    l-0.2-0.3c-0.3-0.7-0.7-1.3-1.1-1.9l-0.2-0.3c-0.4-0.6-0.8-1.2-1.3-1.8l0,0c-3.8-6.5-2.3-11.4-1.5-13.4l33.1-62.4
                    c1.3-2,4.8-6.1,12.8-6.4c17.2-0.3,31-14.6,30.7-31.8C347.5,139.3,333.9,125.7,317.1,125.4z" />
                    <path d="M43,339.7l19.9-19.9c3.9-3.9,3.9-10.2,0-14.1l-3.5-3.5c-3.9-3.9-10.2-3.9-14.1,0L2.9,344.5
                    c-3.8,4.4-3.8,10.9,0,15.2l42.4,42.4c3.9,3.9,10.2,3.9,14.1,0l3.5-3.5c3.9-3.9,3.9-10.1,0-14L43,364.7h201.8
                    c0,0,67.3,4.4,118.6-48.6s46.1-119,46.1-119s-0.8-65.9-46.2-107.6c0,0-8.6-9.3-17.6-0.8c-9.5,9-0.5,17.6-0.5,17.6
                    s50.9,44,37.2,121.4S298.2,330,298.2,330c-17.1,6.3-35.1,9.6-53.4,9.8L43,339.7z" />
                    <path d="M86.2,208.1c0,0,0.8,65.9,46.2,107.6c0,0,8.6,9.3,17.6,0.8c9.6-9,0.5-17.6,0.5-17.6s-50.9-44-37.2-121.4
                    s84.2-102.3,84.2-102.3c17-6.3,35-9.6,53.1-9.8c0.1,0,0,0,0,0l0,0l202.1,0.3l-19.9,19.8c-3.9,3.9-3.9,10.1,0,14l3.5,3.5
                    c3.9,3.9,10.2,3.9,14.1,0l42.4-42.4c2-2,3-4.8,2.9-7.6c0.2-2.8-0.9-5.6-2.9-7.6L450.4,2.9c-3.9-3.9-10.2-3.9-14.1,0l-3.5,3.5
                    c-3.9,3.9-3.9,10.3,0,14.2l19.9,20H250.8c0,0-67.3-4.6-118.6,48.5S86.2,208.1,86.2,208.1z" />
                </svg>
            </a>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="vote.php">Voter</a></li>
                    <li><a href="compare.php">Classement</a></li>
                    <li><a href="add.php">Ajouter</a></li>
                </ul>
            </nav>
            <div class="user">
                <?php 
                    if(isset($_SESSION['fb_token'])){
                    ?>
                        <div class="user-portrait">
                            <a href="index.php?logout=true">
                                <span class="logoff"><i class="fa fa-power-off"></i></span>
                                <img src="<?= $_SESSION['fbImg']['url']; ?>" alt="Utilisateur" />
                            </a>
                        </div>
                        <p>Connecté en tant que :<br/><span id="username"><?php echo($_SESSION['fbName']); ?></span></p>
                    <?php
                    }else{
                    ?>
                        <div class="user-portrait">
                            <a href="<?= $fbUrlConnect; ?>"><i class="fa fa-facebook-square"></i>Connection</a>
                        </div>
                    <?php 
                    }
                ?>
            </div>
        </header>