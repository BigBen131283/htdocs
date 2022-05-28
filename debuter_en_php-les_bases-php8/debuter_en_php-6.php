<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // on déclare une fonction et ses (paramètres)
        function additionner($nb1, $nb2){
            // on dit ce qu'elle fait
            echo $nb1 + $nb2;
        }

        function saluer($salutation, $prenom, $nom){
            echo "$salutation $prenom $nom, comment allez vous?";
        }

        function saluer2($salutation = "Hello", $prenom, $nom){
            echo "$salutation $prenom $nom, comment allez vous?";
        }

        function direBonjour($prenom, $nom, $civilite = "", $salutation = "Salut"){ //=Salut est le paramètre par défaut du paramètre $salutation(il faut la mettre à la fin)
            echo "$salutation $civilite $prenom $nom, comment allez vous?";
        }
        /**
         * Undocumented function
         *
         * @param [type] $nb1
         * @param [type] $nb2
         * @return void
         */
        function additionner2($nb1, $nb2){
            return $nb1+$nb2; //return équivaut à un break, tout ce qui est après n'est jamais exécuté
            echo "<p>tu ne me vois pas car je ne suis pas exécuté</p>";
        }
        $total = additionner2(18,8);
        var_dump($total);
    ?>

    <p><?php echo additionner(12, 52); ?></p> <!--on appelle la fonction et on lui passe des (paramètres)-->
    <p><?php echo additionner(15, 2); ?></p>
    <p><?php additionner(252, 47); ?></p> <!--La fonction faisant elle même un écho il n'est pas nécessaire de faire un echo à nouveau -->
    
    <h1><?php saluer("Bonjour","Benjamin","Toubhans"); ?></h1>
    <h1><?php //saluer("Bonjour","Toubhans"); ?></h1> <!--Si on ne passe pas assez d'arguments on a une erreur FATALE -->
    <h1><?php direBonjour("Benjamin","Toubhans"); ?></h1>
    <h1><?php saluer2(prenom: "Benjamin", nom:"Toubhans"); ?></h1> <!--avec php8 on peut utiliser des named arguments / champs nommés-->
    <h1><?php direBonjour(prenom: "Benjamin",nom: "Toubhans", salutation: "Holà"); ?></h1>

</body>
</html>