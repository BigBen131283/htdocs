<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Se connecter à la base de données -->
    <?php
        //Constantes d'environnement
        define("DBHOST", "localhost");
        define("DBUSER", "root");
        define("DBPASS", "root"); // par rapport au tuto moi j'ai un mdp = root 
        define("DBNAME", "tutos-php");

        // DSN de connexion (Data Source Name)
        // $dsn = "mysql:dbname=tutos-php;host=localhost"
        $dsn = "mysql:dbname=".DBNAME.";host=".DBHOST;

        //Se connecter à la base avec try/catch (pour attraper les erreurs et tout stopper s'il y en a une)
        try{//essaye de faire
            // On instancie PDO = créer un PDO qu'on met dans une variable
            $db = new PDO($dsn, DBUSER, DBPASS);
            echo "On est connectés";

            // on s'assure d'envoyer les données en utf8
            $db->exec("SET NAMES utf8");

            // on définit le mode de fetch par défaut
            $db->setAttribute
            (PDO::ATTR_DEFAULT_FETCH_MODE, 
            PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){//sinon fait ça //PDOException est un objet
            die("Erreur:".$e->getMessage()); // arrête le php // qui a une méthode getMessage
        }
        echo "<br/>";

        //ici on est connecté à la base
        //on peut récupérer la liste des utilisateurs (users)
        $sql = "SELECT * FROM `users`"; // attention ce ne sont pas des guillemets simples mais le simbole `
        
        //on exécute directement la requête
        $requete = $db->query($sql);
        var_dump($requete);
        echo "<br/>";

        //on récupère les données (fetch ou fetch all)
        $user = $requete->fetch(); // si on écrit $requete->fetch(PDO::FETCH_ASSOC); on ne récupère que les noms de colonnes (tableau associatif)
                                   // si on écrit $requete->fetch(PDO::FETCH_NUM); on ne récupère que les numéros d'index dans le tableau
                                   // il en existe d'autres
        echo "<pre>";
        var_dump($user); //on récupère le premier user de la liste
        echo "</pre>";
        echo "<br/>";

        echo "Pour récupérer tous les users de la table on utilise fetchAll :<br/>";
        $users = $requete->fetchAll();
        echo "<pre>";
        var_dump($users);
        echo "</pre>";
        echo "<br/>";

        echo "Nouvelle requête :<br/>";
        $sql2 = "SELECT * FROM `users` WHERE `id` = 2";
        $requete2 = $db->query($sql2);
        $userUnique = $requete2->fetch();

        echo "<pre>";
        var_dump($userUnique["email"]); //On accède directement à l'["email"]
        echo "</pre>";
        echo "<br/>";

        // Ajouter un utilisateur
        $sql3 = "INSERT INTO `users`(`email`,`pass`,`roles`)
                VALUES ('bigben131283@gmail.com','s3cr3T','[\"ROLE_USER\"]')"; // attention à l'intérieur des "" il faut utiliser des ''
        $requete3 = $db->query($sql3); 
        // je commente pour ne pas créer le même user à chaque fois que j'actualise la page

        //Modifier un utilisateur
        $sql4 = "UPDATE `users` SET `roles` = 'ROLE_USER'
        WHERE `id` = 3";
        $requete4 = $db->query($sql4);

        //Supprimer des utilisateurs
        $sql5 = "DELETE FROM `users` WHERE `id` > 3";
        $requete5 = $db->query($sql5);

        // savoir combien de lignes ont été supprimées
        echo $requete5->rowCount();
    ?>
</body>
</html>