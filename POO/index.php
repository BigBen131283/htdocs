<?php

use App\Autoloader;
use App\Client\Compte as CompteClient;
// use App\Banque\CompteCourant as CompteCourant;
// use App\Banque\CompteEpargne as CompteEpargne;
use App\Banque\{CompteCourant, CompteEpargne}; //"On n'a pas du tout mis le chargement de notre fichier et ça fonctionne
                                               //ça veut dire que notre autoloader est allé chercher notre class Compte Courant
                                               // là où il est censé la trouver"
                                               // alors qu'est-ce que c'est que cette ligne? si je la commente ça ne marche plus


require_once './classes/Autoloader.php';
Autoloader::register();

//On instancie le compte client

$client = new CompteClient('Gambier', 'Benoit', 'Pontault-Combault');

// On passe ce compte client à l'intérieur de l'instance Compte courant ou compte épargne

$compte1 = new CompteCourant($client, 500, 200);
// $compte2 = new CompteClient();
// $compte1->setDecouvert(200);

// $compte1->setTitulaire('Benjamin');
// $compte1->retirer(200);

var_dump($compte1);
echo '<br/><br/>';

$compteEpargne = new CompteEpargne($client, 200, 10);

var_dump(($compteEpargne));

echo '<br/><br/>';

var_dump($client);

// $compteEpargne->verserInterets();
// $compteEpargne->retirer(100);

// var_dump($compteEpargne);

// $client = new CompteClient;

// echo '<br/><br/>';
// var_dump($client);

?>
<br/><br/>