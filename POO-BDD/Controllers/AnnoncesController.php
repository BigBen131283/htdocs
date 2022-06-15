<?php
namespace App\Controllers;

class AnnoncesController extends Controller
{
    public function index()
    {
        echo "Ici sera la liste des annonces";
        
        include_once ROOT.'/Views/annonces/index.php';
    }
}