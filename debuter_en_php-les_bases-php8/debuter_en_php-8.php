<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- les boucles for et foreach -->
    <?php
        for($nombre = 1; $nombre <= 10; $nombre++){
            echo "<p>$nombre</p>";
        }
        for($nombre = 0; $nombre <= 100; $nombre += 5){
            echo "<p>$nombre</p>";
        }
        for($nombre = 100; $nombre >= 0; $nombre -= 5){
            echo "<p>$nombre</p>";
        }

        //les boucles pour parcourir des tableaux
        $clients = [
            "ref1" => [
                "nom" => "Gambier",
                "prenom" => "Benoit"
            ],
            "ref2" => [
                "nom" => "Toubhans",
                "prenom" => "Benjamin"
            ],
            "ref3" => [
                "nom" => "Pote",
                "prenom" => "Paul"
            ]
        ];

        echo sizeof($clients);
        echo "<br/>";
        for($indice = 0; $indice < sizeof($clients); $indice++){
            // echo "<p>Il y a {$clients[$indice]} clients dans la base.</p>"; // il y a une erreur car $clients est un tableau dont les références sont ref1... et les indices sont 0,1,2... 
            // var_dump($clients[$indice]);
        };
        echo "<br/>";// c'est fasitdieux tout ça... il existe une fonction pour dire "pour chaque client..."

        foreach($clients as $ref => $client){ //$ref => $client permet de récupérer la ref de chaque client
                                                // ref est la clé
                                                // client est la valeur
            var_dump($client); 
            echo "<p>Référence client : $ref</p>";
            echo "<p>{$client["prenom"]} {$client["nom"]}</p>";
        }
        // autre façon de l'écrire de façon plus générique
        echo "<p>Générique avec key et value mais il est peut être préférable de nommer les variables pour ce qu'elles représentent</p>"; 
        foreach($clients as $key => $value){
            echo "<p>Référence client : $key</p>";
            echo "<p>{$value["prenom"]} {$value["nom"]}</p>";
        }


    ?>
    <p></p>
</body>
</html>