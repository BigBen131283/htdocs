<?php
    session_start();

    include "../../includes/header.php";
    include "../../includes/navbar.php";
?>

<h1>Profil de <?= $_SESSION["user"]["pseudo"]?></h1>

<?php
echo "<pre>";
var_dump($_SESSION);
echo "</pre>";
?>

<p>Pseudo : <?= $_SESSION["user"]["pseudo"]?></p>
<p>Email : <?= $_SESSION["user"]["email"]?></p>



<?php
    include "../../includes/footer.php";
?>