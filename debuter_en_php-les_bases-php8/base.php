<!-- Accueil -->

<?php

    require_once "includes/functions.php";

    //On inclut le header
    require "includes/header.php"; 

    //On inclut la navbar
    @include "includes/navbar.php";
?>
    <!-- On écrit ici le contenu de la page -->
    <p>Contenu de la page</p>

<?php
    require_once "includes/connect.php";

    //On inclut le footer
    include_once "includes/footer.php";
?>

<!-- Articles -->

<?php
    $titre = "Liste des articles";
    include "includes/header.php";
    include "includes/navbar.php";
?>
<p>Contenu de la page</p>

<?php
    include "includes/footer.php";
?>