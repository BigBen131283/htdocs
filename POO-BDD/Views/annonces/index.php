<h1>Liste des annonces</h1>
<p>Page d'accueil des annonces</p>

<?php
    foreach($annonces as $annonce):
?>

    <article>
        <h2><a href="/annonces/lire/<?= $annonce->id; ?>"><?= $annonce->titre ?></a></h2>
        <div><?= $annonce->description ?></div>
    </article>
<?php
    endforeach;
?>