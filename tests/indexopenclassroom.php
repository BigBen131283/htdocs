<!-- 
Les variables

string chaînes de caractères
int nombres entiers
float nombres décimaux
bool booléens
NULL valeur nulle 

-->

Objets métiers dans une application

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
        //int
        $userAge = 17; //déclaration d'une variable avec $ et affectation de la valeur, ici 17
        $userAge = 23; //ici 23
        $userAge = 55; //ici 55

        //string
        $fullName = "Matthieu Nebra";
        $email = 'matthieu.nebra@exemple.com';

        $variable = "Mon \"nom\" est Matthieu"; //Si le texte est entouré de guillemets doubles et qu'il contient des guillemets doubles il faut les échapper avec\
        $variable = 'je m\'appelle Matthieu'; // idem pour les guillemets simples

        $variable = "Je m'appelle Matthieu"; // pas de soucis avec ' si le texte est entouré par les ""
        // $variable = 'mon "nom" est Matthieu'; // et inversement... 

        //float
        $price = 57.2; // écrire les virgules avec un point

        // bool
        $isAuthor = true;
        $isAdministrator = false;

        // variable vide (NULL)
        $noValue = NULL;
    ?>
    
    <?php
        // déclarer une variable : echo
        $fullname = 'Mathieu Nebra';
        echo $fullname; // pas besoin de "" pour afficher une variable

        // concatener
        $fullName = "Benjamin Toubhans";
        echo "Bonjour ";
        echo $fullName;
        echo " et bienvenu sur le site !";

        // il y a plus simple : 
        echo "Bonjour $fullName et bienvenue sur le site !";// il faut utiliser les guillemets doubles, les variables à l'intérieur sont analysées et remplacées par leur valeur
        echo 'Bonjour $fullName et bienvenue sur le site !';// ça ne marche pas avec ''   
        echo 'Bonjour ' . $fullName . ' et bienvenue sur le site !'; // ça marche en écrivant la variable en dehors des éléments et en les séparants à l'aide d'un point
        // la dernière méthode est un peu plus rapide car PHP n'a pas besoin de chercher la variable au milieu du texte. 
    ?>

    <?php
        // Opérations de base 
        $number = 2 + 4; //6
        $number = 5 - 1; //4
        $number = 3 * 5; //15
        $number = 10 / 2; // 5
        $number = 3 * 5 + 1; // 16
        $number = (1 + 2) * 2; // 6

        $number = 10;
        $result = ($number + 5) * $number; //150

        // le modulo
        $number = 10 % 5; // $number prend la valeur 0 car la division tombe juste
        $number = 10 % 3; // $number prend la valeur 1 car il reste 1
    ?>

    <?php
        // tester la condition
        $isEnabled = true;

        if ($isEnabled == true) {
            echo "Vous êtes autorisé(e) à accéder au site ✅";
        }
        else {
            echo "Accès refusé ❌ ";
        }
    ?>
    <?php
        $isAllowedToEnter = "Oui";

        // SI on a l'autorisation d'entrer
        if ($isAllowedToEnter == "Oui") {
            // instructions à exécuter quand on est autorisé à entrer
        } // SINON SI on n'a pas l'autorisation d'entrer
        elseif ($isAllowedToEnter == "Non") {
            // instructions à exécuter quand on n'est pas autorisé à entrer
        } // SINON (la variable ne contient ni Oui ni Non, on ne peut pas agir)
        else {
            echo "Euh, je ne comprends pas ton choix, tu peux me le rappeler s'il te plaît ?";
        }
    ?>
    <?php
        $isAllowedToEnter = true;

        if ($isAllowedToEnter) {
            echo "Bienvenue petit nouveau. :o)";
        }
        else {
            echo "T'as pas le droit d'entrer !";
        }

        // conditions multiples && = et || = ou

        $isEnabled = true;
        $isOwner = false;
        
        if ($isEnabled && $isOwner) {
            echo 'Accès à la recette validé ✅';
        } else {
            echo 'Accès à la recette interdit ! ❌';
        }
    ?>
    <!-- Les deux codes ci-dessous donnent le même résultat -->
    <?php
        $chickenRecipesEnabled = true;

        if ($chickenRecipesEnabled) {
            echo '<h1>Liste des recettes à base de poulet</h1>';
        }
    ?>

    <?php $chickenRecipesEnabled = true; ?>
    <?php if ($chickenRecipesEnabled): ?> <!-- Ne pas oublier le ":" -->

        <h1>Liste des recettes à base de poulet</h1>

    <?php endif; ?><!-- Ni le ";" après le endif -->
<!-- 
Comme vous le voyez, dans le second cas on n'a pas utilisé de  echo  .
La syntaxe pour utiliser la condition diffère un peu :
Il n'y a pas d'accolade.
On ajoute  :  après la parenthèse fermante de l'instruction  if  .
Et il faut ajouter une instruction  endif;  . 
-->

<!-- Switch -->
<!-- avec if elseif et else -->
    <?php
        $grade = 16;

        if ($grade == 0) {
            echo "Tu es vraiment un gros nul !!!";
        }

        elseif ($grade == 5) {
            echo "Tu es très mauvais";
        }

        elseif ($grade == 7) {
            echo "Tu es mauvais";
        }

        elseif ($grade == 10) {
            echo "Tu as pile poil la moyenne, c'est un peu juste…";
        }

        elseif ($grade == 12) {
            echo "Tu es assez bon";
        }

        elseif ($grade == 16) {
            echo "Tu te débrouilles très bien !";
        }

        elseif ($grade == 20) {
            echo "Excellent travail, c'est parfait !";
        }

        else {
            echo "Désolé, je n'ai pas de message à afficher pour cette note";
        }
    ?>
<!-- même chose avec switch 
Le switch ne teste que l'égalité, ne permet pas de s'économiser les autres signes < > <= >= !=
Le mot clé default à la fin est un peu l'équivalent du else
Le break permet d'arrêter la lecture du code en cas de correspondance (c'est comme en js)
-->
    <?php
        $grade = 10;

        switch ($grade) // on indique sur quelle variable on travaille
        { 
            case 0: // dans le cas où $grade vaut 0
                echo "Tu es vraiment un gros nul !!!";
            break;
            
            case 5: // dans le cas où $grade vaut 5
                echo "Tu es très mauvais";
            break;
            
            case 7: // dans le cas où $grade vaut 7
                echo "Tu es mauvais";
            break;
            
            case 10: // etc. etc.
                echo "Tu as pile poil la moyenne, c'est un peu juste…";
            break;
            
            case 12:
                echo "Tu es assez bon";
            break;
            
            case 16:
                echo "Tu te débrouilles très bien !";
            break;
            
            case 20:
                echo "Excellent travail, c'est parfait !";
            break;
            
            default:
                echo "Désolé, je n'ai pas de message à afficher pour cette note";
        }
    ?>
    <!-- Pour une condition simple on utilise le if, si elle est longue le switch -->

    <!-- Conditions condensées -->
    <!-- former normale -->
    <?php
        $userAge = 24;

        if ($userAge >= 18) {
            $isAdult = true;
        }
        else {
            $isAdult = false;
        }
    ?>

    <!-- Forme condensée -->
    <?php
        $userAge = 24;

        $isAdult = ($userAge >= 18) ? true : false;

        // Ou mieux, dans ce cas précis
        $isAdult = ($userAge >= 18);
    ?>

<!-- 
Les boucles 
While
-->

    <!-- Les tableaux -->
    <?php
    $user1 = ['Mickaël Andrieu', 'email', 'S3cr3t', 34];

        echo $user1[0]; // "Mickaël Andrieu"
        echo $user1[1]; // "email"
        echo $user1[3]; // 34
    ?>
    <!-- tableaux contenus dans un autre tableau -->
    <?php

        $mickael = ['Mickaël Andrieu', 'mickael.andrieu@exemple.com', 'S3cr3t', 34];
        $mathieu = ['Mathieu Nebra', 'mathieu.nebra@exemple.com', 'devine', 33];
        $laurene = ['Laurène Castor', 'laurene.castor@exemple.com', 'P4ssw0rD', 28];

        $users = [$mickael, $mathieu, $laurene];

        echo $users[1][1]; // "mathieu.nebra@exemple.com"
    ?>

    <?php
        $lines = 1;

        while ($lines <= 100) {
            echo 'Je ne dois pas regarder les mouches voler quand j\'apprends le PHP.<br />';
            $lines++; // $lines = $lines + 1
        }
        // cette boucle va afficher 100 lignes, la balise <br /> permet d'effectuer un retour à la ligne
    ?> 
    <?php
        $lines = 1;

        while ($lines <= 100)
        {
            echo 'Ceci est la ligne n°' . $lines . '<br />';
            $lines++;
        }
    ?>

        <!--
Affiche : 
        Ceci est la ligne n°1
        Ceci est la ligne n°2
        ...
        -->
        
    <?php

        $lines = 3; // nombre d'utilisateurs dans le tableau
        $counter = 0;

        while ($counter < $lines) {
            echo $users[$counter][0] . ' ' . $users[$counter][1] . '<br />';
            $counter++; // Ne surtout pas oublier la condition de sortie !
        }
    ?>
    
<!-- 
Les boucles 
For
-->
    <?php
        for ($lines = 0; $lines <= 2; $lines++)
        {
            echo $users[$lines][0] . ' ' . $users[$lines][1] . '<br />';
        }
    ?>

<!-- 
while  est plus simple et plus flexible : 
    on peut faire tous les types de boucles avec, 
    mais on peut oublier de faire certaines étapes, 
    comme l'incrémentation de la variable.

for  est bien adapté quand on doit compter 
    le nombre de fois que l'on répète les instructions, 
    et il permet de ne pas oublier de faire l'incrémentation 
    pour augmenter la valeur de la variable ! 
-->

<?php

    // Déclaration du tableau des recettes
    $recipes = [
        ['Cassoulet','[...]','mickael.andrieu@exemple.com',true,],
        ['Couscous','[...]','mickael.andrieu@exemple.com',false,],
    ];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Affichage des recettes</title>
</head>
<body>
    <ul>
        <?php for ($lines = 0; $lines <= 1; $lines++): ?>
            <li><?php echo $recipes[$lines][0] . ' (' . $recipes[$lines][2] . ')'; ?></li>
        <?php endfor; ?>
    </ul>
</body>
</html>

<!-- Les Tableaux -->
<!-- les tableaux numérotés -->
<?php
    $recipes = ['Cassoulet', 'Couscous', 'Escalope Milanaise', 'Salade César',];

    // La fonction array permet aussi de créer un array
    $recipes = array('Cassoulet', 'Couscous', 'Escalope Milanaise');

    // On peut aussi créer le tableau case par case : 
    $recipes[0] = 'Cassoulet';
    $recipes[1] = 'Couscous';
    $recipes[2] = 'Escalope Milanaise';

    // PHP peut aussi sélectionner lui même les indices : 
    $recipes[] = 'Cassoulet'; // Créera $recipes[0]
    $recipes[] = 'Couscous'; // Créera $recipes[1]
    $recipes[] = 'Escalope Milanaise'; // Créera $recipes[2]
?>

<!-- Les tableaux associatifs (équivalent des objets et des Map en JS) -->
<?php
    // Une bien meilleure façon de stocker une recette !
    $recipe = [
        'title' => 'Cassoulet', //la => sert à dire "associé à"
        'recipe' => 'Etape 1 : des flageolets, Etape 2 : ...',
        'author' => 'john.doe@exemple.com',
        'enabled' => true,
    ];
?>
<!-- Pour extraire le titre de la recette on devra écrire : -->
<?php
    echo $recipe['title']; //affiche Cassoulet
?>
<!-- 
Les tableaux numérotés permettent de stocker une série d'éléments du même type, comme des prénoms. 
Chaque élément du tableau contiendra alors un prénom.

Les tableaux associatifs permettent de découper une donnée en plusieurs sous-éléments. 
Par exemple, une adresse peut être découpée en nom, prénom, nom de rue, ville…
 -->

<!-- Parcourir un tableau -->
<!-- 
Lorsqu'un tableau a été créé, on a souvent besoin de le parcourir pour savoir ce qu'il contient. 
Nous allons voir trois moyens d'explorer un tableau :
La boucle  for  .
La boucle  foreach  .
La fonction print_r (utilisée principalement pour le déboggage). 
-->

<?php
/** Avec la boucle FOR
 * Déclaration du tableau des recettes
 * Chaque élément du tableau est un tableau numéroté (une recette)
 */
    $recipes = [
        ['Cassoulet','[...]','mickael.andrieu@exemple.com',true,],
        ['Couscous','[...]','mickael.andrieu@exemple.com',false,],
    ];

    for ($lines = 0; $lines <= 1; $lines++) {
        echo $recipes[$lines][0];
    }
?>

<?php
// Avec la boucle FOREACH
//Déclaration du tableau des recettes
    $recipes = [
        ['Cassoulet','[...]','mickael.andrieu@exemple.com',true,],
        ['Couscous','[...]','mickael.andrieu@exemple.com',false,],
    ];

    foreach ($recipes as $recipe) {
        echo $recipe[0]; // Affichera Cassoulet, puis Couscous
    }
?>

<?php
// L'avantage de FOREACH c'est qu'elle permet de parcourir aussi les tableaux associatifs
    $recipe = [
        'title' => 'Cassoulet',
        'recipe' => 'Etape 1 : des flageolets, Etape 2 : ...',
        'author' => 'mickael.andrieu@exemple.com',
        'enabled' => true,
    ];

    foreach ($recipe as $value) {
        echo $value;
    }
/**
 * AFFICHE
 * CassouletEtape 1 : des flageolets, Etape 2 : ...mickael.andrieu@exemple.com1
 */
// L'intérêt devient encore plus flagrant quand nous utilisons un tableau de tableaux :
    $recipes = [
        [
            'title' => 'Cassoulet',
            'recipe' => '',
            'author' => 'mickael.andrieu@exemple.com',
            'is_enabled' => true,
        ],
        [
            'title' => 'Couscous',
            'recipe' => '',
            'author' => 'mickael.andrieu@exemple.com',
            'is_enabled' => false,
        ],
        [
            'title' => 'Escalope milanaise',
            'recipe' => '',
            'author' => 'mathieu.nebra@exemple.com',
            'is_enabled' => true,
        ],
        [
            'title' => 'Salade Romaine',
            'recipe' => '',
            'author' => 'laurene.castor@exemple.com',
            'is_enabled' => false,
        ],
    ];

    foreach($recipes as $recipe) {
        echo $recipe['title'] . ' contribué(e) par : ' . $recipe['author'] . PHP_EOL; 
    }
?>

<!-- Avec la fonction print_r -->
<!-- 
    Mais si vous n'avez pas besoin d'une mise en forme spéciale 
    et que vous voulez juste savoir ce que contient le tableau, 
    vous pouvez faire appel à la fonction print_r  . 
    C'est une sorte de echo  spécialisé dans les tableaux. 
-->

<?php
    $recipes = [
        [
            'title' => 'Cassoulet',
            'recipe' => '',
            'author' => 'mickael.andrieu@exemple.com',
            'is_enabled' => true,
        ],
        [
            'title' => 'Couscous',
            'recipe' => '',
            'author' => 'mickael.andrieu@exemple.com',
            'is_enabled' => false,
        ],
    ];

    echo '<pre>';
    print_r($recipes);
    echo '</pre>';
?>

<!-- rechercher dans un tableau -->
<?php array_key_exists('cle', $array); ?>
<!--
    vérifie si une clé existe dans un tableau 
    la fonction renvoie un booléen, true si la clé est dans le tableau
    permet de faire un test facilement avec un if
-->

<?php
    $users = [
        'Mathieu Nebra',
        'Mickaël Andrieu',
        'Laurène Castor',
    ];

    if (in_array('Mathieu Nebra', $users))
    {
        echo 'Mathieu fait bien partie des utilisateurs enregistrés !';
    }

    if (in_array('Arlette Chabot', $users))
    {
        echo 'Arlette fait bien partie des utilisateurs enregistrés !';
    }
?>
<!-- 
    Vérifie si une valeur existe dans le tableau
    la fonction renvoie un booléen, true si la valeur est dans le tableau
 -->

<?php
    $users = [
        'Mathieu Nebra',
        'Mickaël Andrieu',
        'Laurène Castor',
    ];

    $positionMathieu = array_search('Mathieu Nebra', $users);
    echo '"Mathieu" se trouve en position ' . $positionMathieu . PHP_EOL;

    $positionLaurène = array_search('Laurène Castor', $users);
    echo '"Laurène" se trouve en position ' . $positionLaurène . PHP_EOL;
?>
<!-- 
    récupère la clé d'une valeur dans un tableau numéroté
 -->

<?php
    $recipes = [
        [
            'title' => 'Cassoulet',
            'recipe' => 'Etape 1 : des flageolets !',
            'author' => 'mickael.andrieu@exemple.com',
            'is_enabled' => true,
        ],
        [
            'title' => 'Couscous',
            'recipe' => 'Etape 1 : de la semoule',
            'author' => 'mickael.andrieu@exemple.com',
            'is_enabled' => false,
        ],
        [
            'title' => 'Escalope milanaise',
            'recipe' => 'Etape 1 : prenez une belle escalope',
            'author' => 'mathieu.nebra@exemple.com',
            'is_enabled' => true,
        ],
    ];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Affichage des recettes</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body>
    <div class="container">
        <h1>Affichage des recettes</h1>
        <!-- Boucle sur les recettes -->
        <?php foreach($recipes as $recipe) : ?>
            <!-- si la clé existe et a pour valeur "vrai", on affiche -->
            <?php if (array_key_exists('is_enabled', $recipe) && $recipe['is_enabled'] == true): ?>

                <article>
                    <h3><?php echo $recipe['title']; ?></h3>
                    <div><?php echo $recipe['recipe']; ?></div>
                    <i><?php echo $recipe['author']; ?></i>
                </article>

            <?php endif; ?>
        <?php endforeach ?>
    </div>   
</body>
</html>

<!-- Fonctions PHP existantes -->
<!-- 
str_replace pour rechercher et remplacer des mots dans une variable ;
move_uploaded_file pour envoyer un fichier sur un serveur ;
imagecreate pour créer des images miniatures (aussi appelées "thumbnails") ;
mail pour envoyer un mail avec PHP (très pratique pour faire une newsletter) ;

de nombreuses options pour modifier des images, y écrire du texte, tracer des lignes, des rectangles, etc. ;
crypt pour chiffrer des mots de passe ;
date  pour renvoyer l'heure, la date, etc.

strlen pour calculer la longueur d'une chaîne de caractères ;
str_replace pour rechercher et remplacer une chaîne de caractères ;
sprintf pour formater une chaîne de caractères.
-->

<!-- Ecrire sois même une fonction -->

<?php

    $recipe = [
        'title' => 'Salade Romaine',
        'recipe' => 'Etape 1 : Lavez la salade ; Etape 2 : euh ...',
        'author' => 'laurene.castor@exemple.com',
        'is_enabled' => true,
    ];

    // au minimum
    if ($recipe['is_enabled']) {
        return true;
    } else {
        return false;
    };

    // mieux
    $isEnabled = $recipe['is_enabled'];

    // encore mieux !
    if (array_key_exists('is_enabled', $recipe)) {
        $isEnabled = $recipe['is_enabled'];
    } else {
        $isEnabled = false;
    };

    
?>

<?php
//Voici la fonction correspondante :
    function isValidRecipe(array $recipe) : bool
    {
        if (array_key_exists('is_enabled', $recipe)) {
            $isEnabled = $recipe['is_enabled'];
        } else {
            $isEnabled = false;
        }
    
        return $isEnabled;
    }

    // Pour créer une fonction : 
    // Vous devez taper function  (en français, ça veut dire « fonction »).
    // Ensuite, donnez-lui un nom. Par exemple, celle-ci s'appelle  isValidRecipe

?>

<?php

$recipes = [...]; // Les recettes

// AVANT

foreach ($recipes as $recipe) {
    if ($recipe['is_enabled']) {
        // echo $recipe['title'] ..
    }
}

// APRES

function getRecipes(array $recipes) : array
{
    $validRecipes = [];

    foreach($recipes as $recipe) {
        if (isValidRecipe($recipe)) {
            $validRecipes[] = $recipe;
        }
    }

    return $validRecipes;
}

// construire l'affichage HTML des recettes
foreach(getRecipes($recipes) as $recipe) {
    // echo $recipe['title'] .. 
}

?>

</body>
</html>