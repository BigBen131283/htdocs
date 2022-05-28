<?php
    //on démarre la session php
    session_start();

    // on vérifie si on a un id
    if(!isset($_GET["id"]) || empty($_GET["id"])){
        // Je n'ai pas d'id
        header("Location: articles.php");
        exit;
    }

    //Je récupère l'id
    $id = $_GET["id"];

    // on va chercher l'article dans la base
    // on se connecte à la base
    require_once "includes/connect.php";

    // on écrit la requête
    $sql = "SELECT * FROM `articles` WHERE `id` = :id"; //:id parce que mon id vient de l'extérieur je ne dois pas lui faire confiance

    // on prépare la requête
    $requete = $db->prepare($sql);

    // on injecte les paramètre
    $requete->bindValue(":id", $id, PDO::PARAM_INT); //de cette façon s'il y a un probleme de script on intègre un entier.

    // On exécute la requête
    $requete->execute();

    // On récupère l'article
    $article = $requete->fetch();

    //On vérifie si l'article est vide
    if(!$article){
        // pas d'article, erreur 404
        http_response_code(404);
        echo "Article inexistant";
        exit;
    }

    // Ici on a un article

    //On définit le titre
    $titre = strip_tags($article["title"]);

    //On inclut le header
    include "includes/header.php";

    //On inclut la navbar
    include "includes/navbar.php";
?>


<article>
    <h1><?php echo strip_tags($article["title"])?></h1>
    <p>Publié le <?= $article["created_at"]?></p>
    <div><?= strip_tags($article["content"])?></div>
    
</article>


<?php
    //On inclut le footer
    include "includes/footer.php";
?>