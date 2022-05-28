<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- commentaire HTML -->
    <?php
        //on écrit Hello World
        echo "<h1>Hello World</h1>";
        echo "<br/>";

        $nomPersonne = "Benoît";

        // L'injection de variable fonctionne uniquement avec le "", pas avec ''
        echo "<p>Bonjour $nomPersonne, comment ça va?</p>";
        echo "<br/>";

        // Les types de variables
        // Entiers (integer)
        $nombre = 85;

        //Décimaux (float)
        $nombre2 = 85.2;

        //Chaînes de caractères (string)
        $chaine = "Ceci est un texte";

        // Booléen (boolean)
        $booleen = true; //false

        //Connaître le contenu et le type d'une variable
        var_dump($chaine);
        echo "<br/>";
    ?>
    
</body>
</html>