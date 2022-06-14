<?php

use App\Autoloader;
use App\Models\AnnoncesModel;
use App\Models\UsersModel;

require_once './Autoloader.php';
Autoloader::register();

$model = new UsersModel;

$user = $model->setEmail('contact@cours.fr')
              ->setPassword(password_hash('azerty', PASSWORD_ARGON2I));

$model->create($user);
// echo '<br/>';

$annonce = $model->find(3);

// var_dump($annonce);

?>