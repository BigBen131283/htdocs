<?php
session_start();
if(!isset($_SESSION["user"])){
    header("Location: connexion.php");
    exit;
}

//supprime une variable
unset($_SESSION["user"]);

header("Location: ../../index.php");
?>