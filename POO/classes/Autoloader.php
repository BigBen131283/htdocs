<?php

namespace App;

class Autoloader
{
    static function register() //Les méthodes static vont être accessibles sans avoir à instancier la classe
    {
        spl_autoload_register([
            __CLASS__,
            'autoload'
        ]);
    }

    static function autoload($class)
    {
        // On récupère dans $class la totalité du namespace de la classe concernée
        // (App\Client\Compte)
        // echo __NAMESPACE__; // je ne comprends pas ce que je lis
        // echo '<br/>';
        // On retire App\ (Client\Compte)
        $class = str_replace(__NAMESPACE__ . '\\', '', $class);

        // On remplace les \ par des /
        $class = str_replace('\\', '/', $class);
        
        // echo __DIR__ . '/' . $class . '.php';

        $fichier = __DIR__ . '/' . $class . '.php';
        // On vérifie si le fichier existe
        if(file_exists($fichier)){
            require_once __DIR__ . '/' . $class . '.php';
        }
        
    }
}

// require_once './classes/Banque/Compte.php';
// require_once './classes/Banque/CompteCourant.php';
// require_once './classes/Banque/CompteEpargne.php';
// require_once './classes/Client/Compte.php';