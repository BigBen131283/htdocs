<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get">
        <div>
            <label for="nombre1">Nombre 1</label>
            <input type="number" id="nombre1" name="nb1"> <!-- l'id doit être le même que celui du label
                                                            // le name est obligatoire pour savoir sous quel nom l'information est transmise-->
        </div>
        <div>
            <label for="nombre2">Nombre 2</label>
            <input type="number" id="nombre2" name="nb2"> 
        </div>
        <button type="submit">Calculer</button>
    </form>
    
    <?php
        // http://localhost/D%c3%a9buter%20en%20PHP%20-%20les%20bases%20-%20(PHP8)/?nb1=124&nb2=36
        echo "<pre>";
        var_dump($_GET); //on récupère des string car ça passe dans l'url
        echo "</pre>";
        echo"<br/>";

        echo "<pre>";
        var_dump($_GET["nb1"]); // même chose avec nb2
        echo "</pre>";
        echo"<br/>";

        $total = $_GET["nb1"] + $_GET["nb2"];
        echo "<p>Total : $total</p>";
        echo"<br/>";

        // avec $_GET on peut récupérer toutes les informations contenues dans l'URL
        // par exemple si on ajoute &demo=Brouette à l'url 
        // http://localhost/D%C3%A9buter%20en%20PHP%20-%20les%20bases%20-%20(PHP8)/?nb1=14&nb2=13&demo=Brouette
        //et qu'on fait :
        echo $_GET["demo"];
        echo"<br/>";
    ?> 
</body>
</html>