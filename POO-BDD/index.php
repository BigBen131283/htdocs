<?php

use App\Autoloader;
use App\Models\AnnoncesModel;

require_once './Autoloader.php';
Autoloader::register();

$model = new AnnoncesModel;

$donnees = [ 
    'titre' => 'Annonce modifiée',
    'description' => 'Description de l\'annonce modifiée',
    'actif' => 0
];

$annonce = $model->hydrate($donnees);

// $annonce = $model->setTitre('Nouvelle Annonce');
// $annonce = $model->setDescription('Nouvelle Description');
// $annonce = $model->setActif(1);

// $annonce = $model
//     ->setTitre('Nouvelle publication')
//     ->setDescription('Description Nouvelle')
//     ->setActif(1);

$model->delete(5);

// var_dump($annonce);

?>