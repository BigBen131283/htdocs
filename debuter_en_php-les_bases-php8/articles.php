<?php
    //on démarre la session php
    session_start();
    
    // on va chercher les articles dans la base
    // on se connecte à la base
    require_once "includes/connect.php";

    // on écrit la requête
    $sql = "SELECT * FROM `articles` ORDER BY `created_at` DESC";

    // on exécute la requête
    $requete = $db->query($sql);

    //on récupère les données
    $articles = $requete->fetchAll();

    //On définit le titre
    $titre = "Liste des articles";
    //On inclut le header
    include "includes/header.php";

    //On inclut la navbar
    include "includes/navbar.php";
?>

<h1>Liste des articles</h1>
    <section>
        <?php foreach($articles as $article):?>
    
        <article>
            <h1><a href="article.php?id=<?= $article["id"]?>"><?php echo strip_tags($article["title"])?></a></h1> <!--ou un code court <h1><?= $article["title"]?></h1>-->
            <p>Publié le <?= $article["created_at"]?></p>
            <div><?= strip_tags($article["content"])?></div>
            <!-- strip_tags permet de protéger les données ne pas l'utiliser si la variable contient du html car il serait ignoré-->
        </article>

        <?php endforeach;?>
    </section>

<?php
    //On inclut le footer
    include "includes/footer.php";
?>