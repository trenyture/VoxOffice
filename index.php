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

        <title>VoxOffice</title>

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

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

        <!-- Stylesheets -->
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
    </head>
    <body class="home">
        <header>
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Vote</a></li>
                    <li><a href="#">Ratings</a></li>
                    <li><a href="#">Add</a></li>
                </ul>
            </nav>
            <div>
                <img src="#" alt="Utilisateur" title="Utilisateur" />
                <p>Connecté en tant que :<br/><span id="username" class="uppercase highlight">Pierre Prézelin</span></p>
            </div>
        </header>
        <section class="home-intro">
            <h1><a href="#" title="VoxOffice - Accueil" alt="VoxOffice - Accueil">Vox<span>Office</span></a></h1>
            <article>
                <p>Tous vos films favoris. Classés.</p>
            </article>
            <a href="#" class="btn btn-home">Go!</a>
            <a href="#home-description"><span></span></a>
        </section>
        <section class="home-description">
            <div class="content-large">
                <h2>Le concept.</h2>
                <p>VoxOffice est un projet visant la création d'une classification ultra rapide de milliers de films. Pour atteindre cet objectif, <span class="uppercase">Vous</span> êtes le principal acteur, en pouvant <span class="uppercase">voter</span>, <span class="uppercase">ajouter</span> et <span class="uppercase">comparer</span> tous les films que vous voulez.</p>
                <p>Choisissez rapidement parmi deux films proposés, pour créer un top des "meilleurs" et des "pires".</p>
                <p>Nous nous chargeons du reste. <span class="majuscule">Aussi simple que cela!</span></p>
                <p>Vous pouvez lire la <a href="#">documentation</a> pour plus d'informations ou sur le <a href="#">dépôt officiel GitHub</a>.</p>
            </div>
        </section>
        <section class="home-features">
            <div class="content">
                <h2>Comment faire</h2>
                <ul>
                    <li>
                        <h3>Votez.</h3>
                        <img src="#" alt="Votez - VoxOffice" title="Votez - VoxOffice" />
                        <p>Lorem ipsum dolor sit ament, consectetur adipiscing elit.</p>
                        <a href="#" alt="Essayer - VoxOffice" title="Essayer - VoxOffice">Essayer</a>
                    </li>
                    <li>
                        <h3>Ajoutez.</h3>
                        <img src="#" alt="Ajoutez - VoxOffice" title="Ajoutez - VoxOffice" />
                        <p>Lorem ipsum dolor sit ament, consectetur adipiscing elit.</p>
                        <a href="#" alt="Essayer - VoxOffice" title="Essayer - VoxOffice">Essayer</a>
                    </li>
                    <li>
                        <h3>Comparez.</h3>
                        <img src="#" alt="Comparz - VoxOffice" title="Comparez - VoxOffice" />
                        <p>Lorem ipsum dolor sit ament, consectetur adipiscing elit.</p>
                        <a href="#" alt="Essayer - VoxOffice" title="Essayer - VoxOffice">Essayer</a>
                    </li>
                </ul>
            </div>
        </section>
        <section class="home-connect">
            <div class="content">
                <h2>Lancez-vous</h2>
                <p>En vous connectant à Facebook, nous pouvez directement vous aider vous et vos amis à trouver les plus grands films !</p>
                <p class="alert">Ce, sans aucune publicité, tracking, ou notifications intrusives.</p>
                <a href="#" alt="Connexion à Facebook - VoxOffice" title="Connexion à Facebook - VoxOffice"></a>
            </div>
        </section>
        <footer>
            <div class="content-large">
                <ul>
                    <li>Versions</li>
                    <li>FAQ</li>
                    <li>Contact</li>
                </ul>
                <p><span class="icon icon-lab"></span>par Simon-tr et Pierre Prezelin. Copyright 2016</p>
            </div>
        </footer>

        <!-- Scripts -->
        <script src="js/jquery-2.2.0.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>