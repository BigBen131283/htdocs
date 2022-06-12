<?php

namespace App\Models;

use App\Db\Db;

class Model extends Db
{
    // Table de la base de données
    protected $table;

    // Instance de Db
    private $db;

    public function findAll()
    {
        $query = $this->requete('SELECT * FROM '. $this->table);
        return $query->fetchAll();
    }

    public function findBy(array $criterias)
    {
        $champs = [];
        $valeurs = [];

        // On boucle pour éclater le tableau
        foreach($criterias as $champ => $valeur){
            //SELECT * from annonces WHERE actif = ?
            // bindvalue(1, valeur)
            $champs[] = "$champ = ?";
            $valeurs[] = $valeur;
        }

        // On transforme le tableau "champs" en une chaîne de caratères
        $liste_champs = implode(' AND ', $champs);
        
        // On exécute la requête
        return $this->requete('SELECT * FROM'.$this->table.' WHERE '. $liste_champs, $valeurs)->fetchAll();
    }


    public function requete(string $sql, array $attributs = null)
    {
        // On récupère l'instance de Db
        $this->db = Db::getInstance();

        // On vérifie si on a des attributs
        if($attributs != null){
            // Requête préparée
            $query = $this->db->prepare($sql);
            $query = execute($attributs);
            return $query;
        }
        else{
            // Requête simple
            return $this->db->query($sql);
        }
    }
}