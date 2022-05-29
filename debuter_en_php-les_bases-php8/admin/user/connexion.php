<?php
    // on le met tout en haut pour rediriger l'utilisateur une fois qu'il est inscrit
    // = ouvrir la session
    session_start();//on démarre la session php
    if(isset($_SESSION["user"])){
        header("Location: profil.php");
        exit;
    }

    // on vérifie si le formulaire a été envoyé
    if(!empty($_POST)){
        if(isset($_POST["email"], $_POST["pass"]) && !empty($_POST["email"]) &&!empty($_POST["pass"])
        ){
            $_SESSION["error"] = [];
            //on vérifie que l'email en est un
            if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                $_SESSION["error"][] = "L'adresse mail est incorrecte"; // $_SESSION["error"][] : push
            }

            if($_SESSION["error"] === []){
                //on se connecte à la base de données
                require_once "../../includes/connect.php";

                //
                $sql = "SELECT * FROM `users` WHERE `email` = :email";

                $query = $db->prepare($sql);

                $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
                
                $query->execute();

                $user = $query->fetch();
                
                if(!$user){
                    $_SESSION["error"] = "L'utilisateur et/ou le mot de passe est incorrect";
                }

                // ici on a un user existant, on peut donc vérifier son mot de passe
                if(!password_verify($_POST["pass"], $user["pass"])){
                    $_SESSION["error"] = "L'utilisateur et/ou le mot de passe est incorrect";
                }

                //L'utilisateur et le mot de passe sont corrects
                // on va pouvoir connecter l'utilisateur
                
                if($_SESSION["error"] === []){
                    //on stocke dans $_session les informations de l'utilisateur
                    $_SESSION["user"] = [
                        "id" => $user["id"],
                        "pseudo" => $user["username"],
                        "email" => $user["email"],
                        "roles" => $user["roles"]
                    ];
                
                    //On redirige vers la page de profil(par exemple)
                    header("Location: profil.php");
                }
            }
        }
    }

    include "../../includes/header.php";
    include "../../includes/navbar.php";
?>

<h1>Connexion</h1>

<?php
echo "<pre>";
var_dump($_SESSION);
echo "</pre>";
?>

<form method="post">
    <div>
        <label for="email">Adresse email</label>
        <input type="email" name="email" id="email">
    </div>
    <div>
        <label for="pass">Mot de passe</label>
        <input type="password" name="pass" id="pass">
    </div>
    <button type="submit">Me Connecter</button> 
    <!-- button a par défaut un type submit -->
</form>



<?php
    include "../../includes/footer.php";
?>