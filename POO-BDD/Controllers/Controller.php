<?php
namespace App\Controllers;

 abstract class Controller
{
    public function render(string $fichier, array $donnees = [], string $template = 'default')
    {
      
        // On extrait le contenu de $donnees
        extract($donnees);

        // on démarre le buffer de sortie
        ob_start();
        // à partir de ce point toute sortie est conservée en mémoire

        // On créé le chemin vers la vue
        require_once ROOT.'/Views/'.$fichier.'.php';
        
        // Transfère le buffer dans $content
        $content = ob_get_clean();

        // Template de la page
        require_once ROOT.'/Views/'.$template.'.php';
    }
}