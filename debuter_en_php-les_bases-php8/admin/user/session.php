<?php
session_start();

echo "<pre>";
var_dump($_SESSION);
echo "</pre>";

$_SESSION["panier"] = [
    "produits" => ["Brouette","Dameuse","Chaise"]
];

?>

