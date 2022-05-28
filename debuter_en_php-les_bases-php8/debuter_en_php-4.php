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
        echo "<pre>";
            //Déclarer un tableau
            $tableau = ["Bonjour", 15, true, 58.15, "Brouette", 45, false];
            echo $tableau[0];
            echo "<br/>";
            var_dump($tableau[1]); // int(15), le premier index est 0
            var_dump($tableau);

            //Ajouter des valeurs
                //A la fin(push)
                array_push($tableau, "Fin", 89, false, 5.34); // autant de valeur qu'on veut, toutes à la fin
                $tableau[] = "Fin"; // quand on ajoute une seule valeur, il vaut mieux utiliser cette forme

                //Au début (unshift)
                array_unshift($tableau, "Début");

            //Supprimer des valeurs
                //A la fin (pop)
                array_pop($tableau); //supprime la dernière valeur du tableau

                $valeur = array_pop($tableau); // stocke la dernière valeur du tableau ("Fin" depuis la ligne 20) dans la variable $valeur
                echo $valeur; // affiche "Fin"
                echo "<br/>";

                //Au début (shift)
                $valeur =  array_shift($tableau);
                echo $valeur;
                echo "<br/>";

                //Diviser le tableau en plusieurs parties de 2 valeurs
                $tableau2 = array_chunk($tableau, 2, true /*pour garder les index du tableau d'origine*/);
                var_dump($tableau2);

                //Mélanger un tableau de façon aléatoire
                shuffle($tableau);
                echo "<br/>";

                $tableauMulti = [
                    0 => [
                        "nom" => "Toubhans",
                        "prenom" => "Benjamin",
                        "age" => 39
                    ],
                    1 => [
                        "nom" => "Toubhans",
                        "prenom" => "Benoit",
                        "age" => 30
                    ],
                    2 => [
                        "nom" => "Toubhans",
                        "prenom" => "Bastien",
                        "age" => 28
                    ],
                    3 => [
                        "nom" => "Toubhans",
                        "prenom" => "Baptiste",
                        "age" => 26
                    ]
                ];
                var_dump($tableauMulti);
                echo "<br/>";
                var_dump($tableauMulti[1]["prenom"]); 


        echo "</pre>";
    ?>

</body>
</html>