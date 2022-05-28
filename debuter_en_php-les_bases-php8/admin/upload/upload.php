<?php
    // echo "<pre>";
    // var_dump($_FILES);
    // echo "</pre>";

    //On vérifie si un fichier a été envoyé
    if(isset($_FILES["image"]) && $_FILES["image"]["error"] === 0){
        //on a reçu l'image
        //on procède aux vérifications
            //si c'est une image l'extention
            // ou le type
            // le poids du fichier
            // les dimensions
            // il ne faut pas faire confiance aux extensions de fichier car une image peut contenir du code php
        // on vérifie toujours l'extension ET le type Mime
        $allowed = [
            "jpg" => "image/jpeg",
            "jpeg" => "image/jpeg",
            "png" => "image/png"
        ];

        $filename = $_FILES["image"]["name"];
        $filetype = $_FILES["image"]["type"];
        $filesize = $_FILES["image"]["size"];

        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION)); //strtolower() permet de mettre en minuscules les caractères du nom du fichier
        
        // on vérifie l'absence de l'extension dans les clés $allowed ou l'absence du type MIME dans les valeurs
        if(!array_key_exists($extension, $allowed) || !in_array($filetype, $allowed)){
            // ici, soit l'extension soit le type sont incorrect 
            die("Erreur: format de fichier incorect");
        }
        //ici le type est correct
        //on limite à 1Mo
        if($filesize > 1024 * 1024){
            die("Fichier trop volumineux");
        }

        // On génère un nom unique
        $newname = md5(uniqid());
        // On génère le chemin complet
        $newfilename = __DIR__ . "./uploads/$newname.$extension";
        
        // On déplace le fichier de tmp à uploads en le renommant
        if(!move_uploaded_file($_FILES["image"]["tmp_name"], $newfilename)){
            die("L'upload a échoué");
        }

        //on interdit l'exécution du fichier
        chmod($newfilename, 0644); //une fois le fichier uploadé, il est protégé, il ne pourra être que lu, il ne pourra pas être exécuté

    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ajout de fichiers</h1>
    <form method="post" enctype="multipart/form-data"> <!--Dès lors qu'on envoie des images il faut mettre cet attribut de façon
                                                        à définir l'encodage des fichiers qu'on envoie 
                                                        Les fichiers sont envoyés dans la superglobale $_FILES-->
        <div>
            <label for="fichier">Fichier</label>
            <input type="file" name="image" id="fichier" multiple> <!--La propiété multiple permet de sélectionner plusieurs fichiers dans le 
                                                                    même formulaire en même temps-->
        </div>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>