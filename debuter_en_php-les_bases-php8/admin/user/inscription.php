<?php
    // on le met tout en haut pour rediriger l'utilisateur une fois qu'il est inscrit
    //on démarre la session php
    session_start();
    if(isset($_SESSION["user"])){
        header("Location: profil.php");
        exit;
    }

    // on vérifie si le formulaire a été envoyé
    if(!empty($_POST)){
        // var_dump($_POST);
        // le formulaire a été envoyé
        // on vérifie que tous les champs requis sont remplis
        // attention pour $_POST dans isset c'est le name qu'on a indiqué dans le html
        if(isset($_POST["nickname"], $_POST["email"], $_POST["pass"])
            && !empty($_POST["nickname"]) && !empty($_POST["email"]) && !empty($_POST["pass"]) 
        ){
            //ici le formulaire est complet
            // on récupère les données en les protégeant
            $pseudo = strip_tags($_POST["nickname"]);

            if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                die("L'adresse email est incorrecte"); // il faut faire des vérifs en back end pour vérifier qu'on ne peut pas tricher
            }

            // on va hasher le mot de passe
            $pass = password_hash($_POST["pass"], PASSWORD_ARGON2ID);

            // ajouter ici tous les contrôles souhaités
            
            //On enregistre en base de données
            require_once "../../includes/connect.php";

            $sql = "INSERT INTO `users`(`username`, `email`, `pass`, `roles`) VALUES(:pseudo, :email, '$pass', '[\"ROLE_USER\"]')";

            //On prépare la requête
            $query = $db->prepare($sql);

            //on injecte les paramètres
            $query->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
            $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);

            //on exécute la requête
            $query->execute();

            //On récupère l'id du nouvel utilisateur
            $id = $db->lastInsertId();

            //on connecte l'utilisateur          
            //on stocke dans $_session les informations de l'utilisateur
            $_SESSION["user"] = [
                "id" => $id,
                "pseudo" => $pseudo,
                "email" => $_POST["email"],
                "roles" => ["ROLES_USER"]
            ];
            
            //On redirige vers la page de profil(par exemple)
            header("Location: profil.php");

        }
        else{
            die("Le formulaire est incomplet");
        }
    }
    
    include "../../includes/header.php";
    include "../../includes/navbar.php";
?>

<h1>Inscription</h1>

<form method="post">
    <div>
        <label for="pseudo">Pseudo</label>
        <input type="text" name="nickname" id="pseudo">
    </div>
    <div>
        <label for="email">Adresse email</label>
        <input type="email" name="email" id="email">
    </div>
    <div>
        <label for="pass">Mot de passe</label>
        <input type="password" name="pass" id="pass">
    </div>
    <button type="submit">M'inscrire</button> 
    <!-- button a par défaut un type submit -->
</form>



<?php
    include "../../includes/footer.php";
?>