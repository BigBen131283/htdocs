<?php
    // imaginons qu'on ait un fochier fonctions.php, l'inclure
    // permet d'appeler des fonctions dans la page
    // avec include, si le fichier est déplacé/renommer et qu'on appelle les fonctions
    // on a un warning, et des erreurs fatales lors de l'appel des fonctions
    // avec require, le fichier devient obligatoire et s'il n'est pas dispo
    // on a un warning et tout de suite une erreur fatale (pas de warning avec @require)
    
    //On définit le titre
    // $titre = "Accueil";
    //On inclut le header
    @include "includes/header.php"; //le include s'il ne s'exécute pas correctement ne va pas bloquer l'exécution du reste
                                    //@include permet de masquer les messages d'erreur

    //On inclut la navbar
    include "includes/navbar.php";
    include "includes/navbar.php";//si on double la commande ça s'affiche en double
    
    //On écrit ici le contenu de la page
?>

<p>Contenu de la page</p>

<?php

    //On inclut le footer
    include_once "includes/footer.php";
    include_once "includes/footer.php"; // avec include_once ça n'apparaît qu'une fois

?>
