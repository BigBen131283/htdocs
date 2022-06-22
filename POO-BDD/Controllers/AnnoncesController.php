<?php
namespace App\Controllers;

use App\Models\AnnoncesModel;

class AnnoncesController extends Controller
{
    /**
     * Cette méthode affichera une page listant toutes les annonces de la base de données
     *
     * @return void
     */
    public function index()
    {
        // On instancie le modèle correspondant à la table annonces
        $annoncesModel = new AnnoncesModel;

        // On va chercher toutes les annonces
        $annonces = $annoncesModel->findAll(['actif' => 1]);
        

        // On génère la vue
        // $this->render('annonces/index', ['annonces' => $annonces]);
        $this->render('annonces/index', compact('annonces'));
    }

    /**
     * affiche une annonce
     *
     * @param integer $id
     * @return void
     */
    public function lire(int $id)
    {
        // On instancie le modèle
        $annoncesModel = new AnnoncesModel;

        // On va chercher une annonce 
        $annonce = $annoncesModel->find($id);

        // On envoie à la vue
        $this->render('annonces/lire', compact('annonce'));
    }

}