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
        $chaine = "Ceci est une chaîne de caractères";

        echo $chaine;
        echo "<br/>";

        //Afficher un caractère particulier de la chaine
        echo $chaine[3]; // affiche i
        echo "<br/>";

        //Modifier un caractère de la chaine
        $chaine[0] = "F";
        echo $chaine; // Feci est une chaîne de caractères
        echo "<br/>";

        //Extraire une partie de la chaîne
        echo substr($chaine, 0, 4); // extrait les 4 caractères de la string chaine à partir de l'index 0
        echo "<br/>";
        var_dump(substr($chaine, 13, 7)); // affiche string(7) "chaîne", attention î compte pour 2 caractères
        echo "<br/>";
        var_dump(substr($chaine, -11)); // affiche string(11) "caractères", le è compte aussi pour 2 caractères.
        echo "<br/>";
                                        // mettre un chiffre nnégatif permet de partir de la fin
        
        //Remplacer une partie de la chaîne de caractère
        $chaine = str_replace('Ceci', 'Cela', $chaine); // il faut respecter la casse 
        $chaine = str_ireplace('ceci', 'Cela', $chaine); // fonctionne même sans respecter la casse

        var_dump(str_contains($chaine, 'une')); // recherche 'une' dans $chaine, retourne bool(true) ou false s'il ne trouve pas le mot
        echo "<br/>";
        var_dump(str_starts_with($chaine, 'Ce')); // regarde si $chaine commence par 'Ce', retourne bool(true)
        echo "<br/>";
        var_dump(str_ends_with($chaine, 'ères')); // regarde si $chaine termine par 'ères', retourne bool(true)
        echo "<br/>";

        var_dump(trim($chaine)); //supprime les espaces en début et en fin de chaîne
        echo "<br/>";

    ?>

</body>
</html>