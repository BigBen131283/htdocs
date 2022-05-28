<?php
    require_once "includes/functions.php";

    //On inclut le header
    require "includes/header.php"; 

    //On inclut la navbar
    @include "includes/navbar.php";
    
    //On écrit ici le contenu de la page
?>

<p>Contenu de la page</p>

<?php

    
    require_once "includes/connect.php";

    // $username = "demo";
    // $username = "Admin'; --"; // il s'agit d'une injection SQL, ce qui suit "Admin'; est pris comme un commentaire en sql
    $username = "admin";
    // $password = "s3cr3dkdfsjkgt' OR 1=1; --"; //ici on récupère tous les users de la base (avec fetchAll)
    // 1=1 est toujours vrai, donc c'est comme si on avait enlevé le WHERE
    $password = "s3cr3t";

    // $sql = "SELECT * FROM `users` WHERE `username`= '$username' AND `pass`= '$password'"; //tout mettre entre ''
    // $requete = $db->query($sql);
    // $user = $requete->fetchAll();
    
    // Requêtes préparées
    // $sql = "SELECT * FROM `users` WHERE `username`=?  AND `pass`=?"; //Avec des points d'interrogation
    $sql = "SELECT * FROM `users` WHERE `username`=:username  AND `pass`=:pass";
    // au lieu de mettre query on va préparer la requête
    $requete = $db->prepare($sql);

    //on va devoir injecter les valeurs "bindValue"
    // $requete->bindValue(1, $username, PDO::PARAM_STR); // quand on utilise ? dans la requête
    // $requete->bindValue(2, $password, PDO::PARAM_STR); // quand on utilise ? dans la requête
    $requete->bindParam(":username", $username, PDO::PARAM_STR);
    $requete->bindValue(":pass", $password, PDO::PARAM_STR);
    
    // si on a des variables qui fluctuent on peut utiliser le bindParam
    // par exemple si on met à jour $username avant l'exécution de la requête, avec bindValue, on n'obtient rien, avec bindParam ça marche

    $username = "demo";
    
    //on exécute
    $requete->execute();

    $user = $requete->fetchAll();

    echo "<pre>";
    var_dump($user);
    echo "</pre>";
    echo "<br/>";

    //On inclut le footer
    include_once "includes/footer.php";

?>
