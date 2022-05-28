<?php
// $mysqlConnection = new PDO(
//     'mysql:host=localhost;dbname=my_recipes;charset=utf8',
//     'root',
//     'root'
// );
?>

<?php
try
{
	$db = new PDO('mysql:host=localhost;dbname=my_recipes;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>

<!-- Preparer une requête à l'aide de l'objet PDO -->

<?php
$recipesStatement = $db->prepare('SELECT * FROM recipes');
?>

<!-- Afficher le résultat d'une requête -->

<?php
$recipesStatement->execute();
$recipes = $recipesStatement->fetchAll();
?>

<?php
try
{
	// On se connecte à MySQL
	$mysqlClient = new PDO('mysql:host=localhost;dbname=my_recipes;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table recipes
$sqlQuery = 'SELECT * FROM recipes';
$recipesStatement = $mysqlClient->prepare($sqlQuery);
$recipesStatement->execute();
$recipes = $recipesStatement->fetchAll();

// On affiche chaque recette une à une
foreach ($recipes as $recipe) {
?>
    <p><?php echo $recipe['author']; ?></p>
<?php
}
?>

<!-- Afficher seulement le contenu de quelques champs -->

<?php
    $sqlQuery = 'SELECT title, author FROM recipes';
?>

<!-- Filtrer les données -->
<?php
    $sqlQuery = 'SELECT * FROM recipes WHERE is_enabled = TRUE';
?>

<!-- Il faut utiliser les mots-clés dans l'ordre que j'ai donné : 
WHERE  puis ORDER BY  puis LIMIT , 
sinon MySQL ne comprendra pas votre requête. -->

<!-- En guise d'exemple complet, voici la requête pour retrouver les recettes valides de Mathieu, 
écrite dans le respect des meilleures pratiques : -->

<?php
$sqlQuery = 'SELECT * FROM recipes WHERE author = :author AND is_enabled = :is_enabled';

$db->prepare($sqlQuery);
$recipes = $db->execute([
    'author' => 'mathieu.nebra@exemple.com',
    'is_enabled' => true,
]);
?>
