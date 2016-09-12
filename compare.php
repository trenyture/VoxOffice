<?php 
    ini_set('display_errors', 1);  error_reporting(E_ALL);
    session_start();
    if(!isset($_SESSION['fb_token'])){
        // Si l'utilisateur accede a cette page sans etre connecté par facebook, on le renvoie sur la page d'accueil
        // header('location:./index');
    }
	require_once('assets/php/includes/header.php');
?>
    <div class="compare-container grey-section">
        <h1>Classement</h1>
        <div class="content-lg">
            <section id="best" class="best">
                <h2>Les "meilleurs" films :</h2>
                <ul class="list-compare">
                    <li>
                        <span>1.</span>
                        <div class="img-film" style="background-image: url('assets/img/films/2001.jpg');"></div>
                        <div class="text-container">
                            <h3>2001 : l'Odyssée de l'Espace</h3>
                            <h4>1968</h4>
                        </div>
                        <div class="score">
                            <p>53</p>
                        </div>
                    </li>
                    <li>
                        <span>2.</span>
                        <div class="img-container">
                            <div class="img-film" style="background-image: url('assets/img/films/interstellar.jpg');"></div>
                        </div>
                        <div class="text-container">
                            <h3>Interstellar</h3>
                            <h4>2014</h4>
                        </div>
                        <div class="score">
                            <p>28</p>
                        </div>
                    </li>
                    <li>
                        <span>3.</span>
                        <div class="img-container">
                            <div class="img-film" style="background-image: url('assets/img/films/laligneverte_2000.jpg');"></div>
                        </div>
                        <div class="text-container">
                            <h3>La Ligne Verte</h3>
                            <h4>2000</h4>
                        </div>
                        <div class="score">
                            <p>12</p>
                        </div>
                    </li>
                </ul>
            </section>
            <section id="worst" class="worst">
                <h2>Les "pires" films :</h2>
                <ul>
                    <li>
                        <span>1.</span>
                        <div class="img-container">
                            <div class="img-film" style="background-image: url('assets/img/films/forrestgump_1994.jpg');"></div>
                        </div>
                        <div class="text-container">
                            <h3>Forest Gump</h3>
                            <h4>1994</h4>
                        </div>
                        <div class="score">
                            <p>-92</p>
                        </div>
                    </li>
                    <li>
                        <span>2.</span>
                        <div class="img-container">
                            <div class="img-film" style="background-image: url('assets/img/films/thedarkknight_2008.jpg');"></div>
                        </div>
                        <div class="text-container">
                            <h3>The Dark Knight</h3>
                            <h4>2008</h4>
                        </div>
                        <div class="score">
                            <p>-68</p>
                        </div>
                    </li>
                    <li>
                        <span>3.</span>
                        <div class="img-container">
                            <div class="img-film" style="background-image: url('assets/img/films/djangounchained_2013.jpg');"></div>
                        </div>
                        <div class="text-container">
                            <h3>Django Unchained</h3>
                            <h4>2013</h4>
                        </div>
                        <div class="score">
                            <p>-76</p>
                        </div>
                    </li>
                </ul>
            </section>
        </div>
        <div class="content-sm center">
            <a href="javascript:;" title="Voir plus" class="btn btn-secondary"><i class="fa fa-plus"></i> Voir plus</a>
        </div>
    </div>
    
    <script type="text/javascript" src="assets/js/compare.js"></script>
    
<?php require_once('assets/php/includes/footer.php'); ?>