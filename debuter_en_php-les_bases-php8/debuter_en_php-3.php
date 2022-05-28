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
        $entier = 10;
        var_dump($entier); //integer(10)
        echo "<br/>";

        $decimal = 14.56;
        var_dump($decimal); //float(14.56)
        echo "<br/>";

        $nombre1 = 14;
        $nombre2 = 85;

        // Addition
        $resultat = $nombre1 + $nombre2;

        // Soustraction
        $resultat = $nombre1 - $nombre2;

        // Multiplication
        $resultat = $nombre1 * $nombre2;

        // Division
        $resultat = $nombre1 / $nombre2;

        // Calcul "complexe"
        $resultat = $nombre1 + $nombre2/5; // 31, respecte les règles de priorités des calculs
        $resultat = ($nombre1+$nombre2)/5; // 19.8

        // Modulo
        $resultat = $nombre2 % $nombre1; // Affiche le reste de la division, permet de vérifier si un nombre un multiple d'un autre
        
        // Incrémenter
        $nombre1 = $nombre1 +1;
        $nombre1 += 1;
        $nombre1++;

        var_dump($nombre1++); // 14
        echo "<br/>";
        var_dump($nombre1); // 15 //dans la première ligne, il affiche la valeur de $nombre1 puis l'incrémente. 
                            // dans la seconde il affiche la valeur incrémentée à la fin de la ligne 45
        echo "<br/>";

        var_dump(++$nombre1); // 15, il incrémente puis affiche la valeur incrémentée de $nombre1
        echo "<br/>";

        // Décrémenter
        $nombre1 = $nombre1 - 1;
        $nombre1 -= 1;
        $nombre1--;
        --$nombre1;

        


    ?>

</body>
</html>