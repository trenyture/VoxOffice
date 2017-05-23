<?php
    ini_set('display_errors', 1);  error_reporting(E_ALL);
    session_start();
    if (!isset($_SESSION['fb_token'])){
        // If user is not connected via facebook, back to home
        header('location:./index');
    }
	require_once('assets/php/includes/header.php');
?>

<div class="compare-container grey-section">
    <h1>Classement</h1>
    <div class="content-lg">
        <section id="best" class="best">
            <h2>Les plus hauts :</h2>
            <ul class="list-compare">

            </ul>
        </section>
        <section id="worst" class="worst">
            <h2>Les plus bas :</h2>
            <ul>

            </ul>
        </section>
    </div>
    <div class="content-sm center">
        <a href="#" title="Voir plus" id="seemore" class="btn btn-secondary"><i class="fa fa-plus"></i> Voir plus</a>
    </div>
</div>

<script type="text/javascript" src="assets/js/compare.js"></script>

<?php require_once('assets/php/includes/footer.php'); ?>
