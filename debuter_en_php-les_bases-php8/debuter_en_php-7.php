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
        // Si le temps est beau
        //     Je prends mes lunettes de soleil
        // Sinon
        //     Je prends mon manteau

        // on pose une question
        $reponse = true;
        if($reponse == true) {
            //alors
            echo "Bravo";
        }
        else {
            //sinon
            echo "Puni";
        }
        echo "<br/>";
        
        $variable = 15;
        $a = 17;
        $b = 21;
        $c = 15;
        $d = 15;
        $e = 21;
        $f = 13;
        // pour comparer ==, égal mais pas en type
        // pour comparer ===, égal en valeur et en type === égalité stricte
        // inférieur strict <, supérieur strict >
        // inférieur ou égal <=, supérieur ou égal >=
        // != différent de en valeur pas en type
        // !== différent de en valeur et en type
        if($variable == 15) {
            //alors
            echo "Egal";
        }
        else {
            //sinon
            echo "Différent";
        }
        echo "<br/>";

        // opérateur combiné <=>
        // < -> -1 si a < b
        // = -> 0 si a = b
        // > -> 1 si a > b
        echo "Opérateur combiné <br/>";
        echo ($a <=> $b);
        echo "<br/>";
        echo ($c <=> $d);
        echo "<br/>";
        echo ($e <=> $f);
        echo "<br/>";
        
        $animal = "Chat";
        //marche aussi avec switch
        switch($animal){
            case "Chat":
                echo "Félin";
                break; //indispensable
            case "Poisson Rouge":
                echo "Poisson";
                break;
            case "Perroquet":
                echo "Oiseau";
                break;
        }
        echo "<br/>";
        echo "<br/>";
        switch($a <=> $b){
            case -1:
                echo "a plus petit que b";
                break; //indispensable
            case 0:
                echo "a égal à b";
                break;
            case 1:
                echo "a plus grand que b";
                break;
        }
        echo "<br/>";
        echo "<br/>";
        switch($c <=> $d){
            case -1:
                echo "c plus petit que d";
                break; //indispensable
            case 0:
                echo "c égal à d";
                break;
            case 1:
                echo "c plus grand que d";
                break;
        }
        echo "<br/>";
        echo "<br/>";
        switch($e <=> $f){
            case -1:
                echo "e plus petit que f";
                break; //indispensable
            case 0:
                echo "e égal à f";
                break;
            case 1:
                echo "e plus grand que f";
                break;
        }
        

    ?>
</body>
</html>