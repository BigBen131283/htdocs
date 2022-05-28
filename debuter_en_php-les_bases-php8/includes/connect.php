<?php
    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASS", "root");
    define("DBNAME", "tutos-php");

    //NE RIEN CHANGER CI-DESSOUS
    //On définit le DSN (Data Source Name) de connexion
    $dsn = "mysql:dbname=".DBNAME.";host=".DBHOST;

    try{
        //on se connecte à la base de données en instanciant le PDO
        $db = new PDO($dsn, DBUSER, DBPASS);

        //on définit le charset à "utf8"
        $db->exec("SET NAMES utf8");

        //on définit la méthode de récupération (fetch) des données
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        //PDOEception$e -> on attrape l'erreur provoquée par le new PDO

        die("Erreur :".$e->getMessage());
    }
?>