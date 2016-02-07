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
        <link rel="apple-touch-icon" sizes="57x57" href="img/favicons/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="img/favicons/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="img/favicons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="img/favicons/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="img/favicons/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="img/favicons/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="img/favicons/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="img/favicons/apple-touch-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-touch-icon-180x180.png">
        <link rel="icon" type="image/png" href="img/favicons/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="img/favicons/favicon-194x194.png" sizes="194x194">
        <link rel="icon" type="image/png" href="img/favicons/favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="img/favicons/android-chrome-192x192.png" sizes="192x192">
        <link rel="icon" type="image/png" href="img/favicons/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="img/favicons/manifest.json">
        <link rel="mask-icon" href="img/favicons/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="shortcut icon" href="img/favicons/favicon.ico">
        <meta name="msapplication-TileColor" content="#7b6696">
        <meta name="msapplication-TileImage" content="img/favicons/mstile-144x144.png">
        <meta name="msapplication-config" content="img/favicons/browserconfig.xml">
        <meta name="theme-color" content="#ffffff">

        <!-- Stylesheets -->
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
        <link rel="stylesheet" type="text/css" href="css/vendors/animate.css" />
        <link rel="stylesheet" type="text/css" href="css/vendors/font-awesome-4.5.0/css/font-awesome.min.css">
    </head>
    <body class="home">
        <header>
            <a href="#" class="logo">
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
            <nav>
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Voter</a></li>
                    <li><a href="#">Classement</a></li>
                    <li><a href="#">Ajouter</a></li>
                </ul>
            </nav>
            <div class="user">
                <div class="user-portrait">
                    <a href="#">
                        <span class="logoff"><i class="fa fa-power-off"></i></span>
                        <img src="img/portrait.jpg" alt="Utilisateur" title="Utilisateur" />
                    </a>
                </div>
                <p>Connecté en tant que :<br/><span id="username">Pierre Prézelin</span></p>
            </div>
        </header>
        <section class="home-intro">
            <div class="intro-content">
                <h1><a href="#" title="VoxOffice - Accueil" alt="VoxOffice - Accueil">Vox<span>Office</span></a></h1>
                <p class="subtitle">Tous vos films favoris. Classés.</p>
                <a href="#" class="btn btn-square">Go!</a>
            </div>
            <a href="#home-description"><span class="icon icon-scroll"></span></a>
        </section>
        <section class="home-description" id="home-description">
            <div class="content-lg">
                <div class="description half">
                    <h2>Le concept.</h2>
                    <p>VoxOffice est un projet visant la création d'une classification ultra rapide de milliers de films. Pour atteindre cet objectif, <span class="uppercase">Vous</span> êtes le principal acteur, en pouvant <span>voter</span>, <span>ajouter</span> et <span>comparer</span> tous les films que vous voulez.</p>
                    <p>Choisissez rapidement parmi deux films proposés, pour créer un top des "meilleurs" et des "pires".</p>
                    <p class="bigger">Nous nous chargeons du reste. <br><span>Aussi simple que cela!</span></p>
                    <p>Vous pouvez lire la <a href="https://github.com/trenyture/VoxOffice" target="_blank">documentation</a> pour plus d'informations ou sur le <a href="https://github.com/trenyture/VoxOffice" target="_blank">dépôt officiel GitHub</a>.</p>
                </div>
            </div>
        </section>
        <section class="home-features">
            <div class="content-md">
                <h2>Comment faire</h2>
                <ul>
                    <li class="feature feature-vote">
                        <div class="feature-content">
                            <h3>Votez.</h3>
                            <p>Vestibulum vehicula sollicitudin dolor sit amet ornare.</p>
                            <p>Nullam nec dictum eros. Sed nisi ante, vestibulum sit amet viverra eget, sollicitudin ac dui. Aliquam nibh velit.</p>
                            <a href="#" class="btn btn-round" alt="Essayer - VoxOffice" title="Essayer - VoxOffice">Essayer</a>
                        </div>
                        <div class="feature-img right wow fadeInRight">
                            <img src="img/vote.svg" alt="Votez - VoxOffice" title="Votez - VoxOffice" />
                        </div>
                    </li>
                    <li class="feature feature-add">
                        <div class="feature-content">
                            <h3>Ajoutez.</h3>
                            <p>Vestibulum vehicula sollicitudin dolor sit amet ornare. Nullam nec dictum eros. Sed nisi ante, vestibulum sit amet viverra eget, sollicitudin ac dui. Aliquam nibh velit.</p>
                            <a href="#" class="btn btn-round" alt="Essayer - VoxOffice" title="Essayer - VoxOffice">Essayer</a>
                        </div>
                        <div class="feature-img left wow fadeInLeft">
                            <img src="img/add.svg" alt="Ajoutez - VoxOffice" title="Ajoutez - VoxOffice" />
                        </div>
                    </li>
                    <li class="feature feature-compare">
                        <div class="feature-content">
                            <h3>Comparez.</h3>
                            <p>Vestibulum vehicula sollicitudin dolor sit amet ornare. Nullam nec dictum eros. Sed nisi ante, vestibulum sit amet viverra eget, sollicitudin ac dui.</p>
                            <p>Aliquam nibh velit.</p>
                            <a href="#" class="btn btn-round" alt="Essayer - VoxOffice" title="Essayer - VoxOffice">Essayer</a>
                        </div>
                        <div class="feature-img right wow fadeInRight">
                            <img src="img/compare.svg" alt="Comparz - VoxOffice" title="Comparez - VoxOffice" />
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <section class="home-connect">
            <div class="content-md">
                <h2>Lancez-vous</h2>
                <div class="content-sm">
                    <p><small>En vous connectant à Facebook, nous pouvez directement vous aider vous et vos amis à trouver les plus grands films !</small></p>
                </div>
                <p class="alert">Ce, sans aucune publicité, tracking, ou notifications intrusives.</p>
                <a href="#" alt="Connexion à Facebook - VoxOffice" title="Connexion à Facebook - VoxOffice" class="btn btn-fb"><i class="fa fa-facebook"></i>Se connecter à Facebook</a>
            </div>
        </section>
        <footer>
            <div class="content-lg">
                <ul>
                    <li><a href="#">Versions</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <p><span class="icon icon-lab"></span>par Simon-tr et Pierre Prezelin • Copyright 2016</p>
            </div>
        </footer>

        <!-- Scripts -->
        <script src="js/jquery-2.2.0.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>