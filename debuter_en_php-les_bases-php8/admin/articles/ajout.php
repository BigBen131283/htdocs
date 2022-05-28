<?php

// var_dump($_POST);

// on traite le formulaire
if(!empty($_POST)){
    //Post n'est pas vide on vérifie que toutes les données sont présentes
    if(
        isset($_POST["titre"], $_POST["contenu"])
        && !empty($_POST["titre"]) && !empty($_POST["contenu"]))
    {
        // Le formulaire est complet
        // on récupère les données en les protégeant (failles XSS)
        // on retire toute balise du titre
        $titre = strip_tags($_POST["titre"]);

        //on neutralise toute balise du contenu
        $contenu = htmlspecialchars($_POST["contenu"]);

        // on peut les enregistrer
        // on se connecte à la base de données
        require_once "../../includes/connect.php";

        // on écrit la requête
        $sql = "INSERT INTO `articles`(`title`,`content`) VALUES (:title, :content)"; //on n'injecte JAMAIS les valeurs en direct on utilise les requêtes préparées

        // on prépare la requête
        if(!$query = $db->prepare($sql))
        {
            die("Une erreur est survenue");
        }

        //on injecte les valeurs
        $query->bindValue(":title", $titre, PDO::PARAM_STR);
        $query->bindValue(":content", $contenu, PDO::PARAM_STR);

        //on exécute la requête
        $query->execute();

        //on récupère l'id de l'article

        $id = $db->lastInsertId();

        die("Article ajouté sous le numéro $id");
    }
    else
    {
        die("Le formulaire est incomplet");
    }
}

$titre = "Ajouter un article";
// on ajoute le header
include_once "../../includes/header.php";
include_once "../../includes/navbar.php";


?>

<h1>Ajouter un article</h1>

<form method="post">
    <div>
        <label for="titre">Titre</label>
        <input type="text" name="titre">
    </div>
    <div>
        <label for="contenu">Contenu</label>
        <textarea name="contenu" id="contenu"></textarea>
    </div>
    <button type="submit">Enregistrer</button>
</form>

<ul>
    <li><a href="http://localhost/debuter_en_php-les_bases-php8/admin/upload/upload.php">Ajout de fichiers</a></li>
</ul>


<?php
include_once "../../includes/footer.php"
?>