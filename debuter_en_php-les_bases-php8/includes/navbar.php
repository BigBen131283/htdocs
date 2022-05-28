<nav>
    <h1>Titre</h1>
    <ul>
        <li><a href="http://localhost/debuter_en_php-les_bases-php8/">Accueil</a></li>
        <li><a href="http://localhost/debuter_en_php-les_bases-php8/articles.php">Articles</a></li>
        <!-- Quand je suis pas connecté j'ai connexion et inscription, quand je suis connecté j'ai déconnexion -->
        <?php if(!isset($_SESSION["user"])): ?>
            <li><a href="http://localhost/debuter_en_php-les_bases-php8/admin/user/connexion.php">Connexion</a></li>
            <li><a href="http://localhost/debuter_en_php-les_bases-php8/admin/user/inscription.php">Inscriptions</a></li>
        <?php else: ?>
            <li>Bonjour <?= $_SESSION["user"]["pseudo"]?></li>
            <li><a href="http://localhost/debuter_en_php-les_bases-php8/admin/user/deconnexion.php">Déconnexion</a></li>
        <?php endif; ?>
        <li>Services</li>
        <li>Contact</li>
        <li><a href="http://localhost/debuter_en_php-les_bases-php8/admin/articles/ajout.php">Admin</a></li>
    </ul>
</nav>