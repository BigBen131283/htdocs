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
        return $this->requete('SELECT * FROM '.$this->table.' WHERE '. $liste_champs, $valeurs)->fetchAll();
    }

    public function find(int $id)
    {
        return $this->requete("SELECT * FROM $this->table WHERE id = $id")->fetch();
    }
    
    public function create(Model $model)
    {
        $champs = [];
        $inter = [];
        $valeurs = [];

        // On boucle pour éclater le tableau
        foreach($model as $champ => $valeur){
            //INSERT INTO annonces from annonces (titre, description, actif) VALUES (?, ?, ?)
            if($valeur != null && $champ != 'db' && $champ != 'table'){    
                $champs[] = "$champ";
                $inter[] = "?";
                $valeurs[] = $valeur;
            }
        }

        // On transforme le tableau "champs" en une chaîne de caratères
        $liste_champs = implode(', ', $champs);
        $liste_inter = implode(', ', $inter);
        
        // echo $liste_champs;
        echo '<br/><br/>';
        // die($liste_inter);
        echo '<br/><br/>';

        // On exécute la requête
        return $this->requete('INSERT INTO '.$this->table.' (' . $liste_champs.') VALUES('.$liste_inter.')', $valeurs);
    }

    public function update(int $id, Model $model)
    {
        $champs = [];
        $valeurs = [];

        // On boucle pour éclater le tableau
        foreach($model as $champ => $valeur){
            //UPDATE annonces SET titre = ?, description = ?, actif = ? WHERE id = ?
            if($valeur !== null && $champ != 'db' && $champ != 'table'){    
                $champs[] = "$champ = ?";
                $valeurs[] = $valeur;
            }
        }
        $valeurs[] = $id;

        // On transforme le tableau "champs" en une chaîne de caratères
        $liste_champs = implode(', ', $champs);
        
        // echo $liste_champs;
        echo '<br/><br/>';
        // die($liste_inter);
        echo '<br/><br/>';

        // On exécute la requête
        return $this->requete('UPDATE '.$this->table.' SET '. $liste_champs.' WHERE id = ? ', $valeurs);
    }

    public function delete(int $id)
    {
        return $this->requete("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }

    public function requete(string $sql, array $attributs = null)
    {
        // On récupère l'instance de Db
        $this->db = Db::getInstance();

        // On vérifie si on a des attributs
        if($attributs != null){
            // Requête préparée
            $query = $this->db->prepare($sql);
            $query->execute($attributs);
            return $query;
        }
        else{
            // Requête simple
            return $this->db->query($sql);
        }
    }

    /**
     * Fonction permettant d'hydrater l'objet
     *
     * @param array $donnees reprend les données qu'il y a dans le tableau dans index.php
     * @return object
     */
    public function hydrate(array $donnees)
    {
        foreach($donnees as $key => $value){
            // On récupère le nom du setter correspondant à la clé (key)
            // ex : titre -> setTitre
            $setter = 'set'.ucfirst($key);
            
            //On vérifie si le setter existe
            if(method_exists($this, $setter)){
                //On appelle le setter
                $this->$setter($value);
            }
        }
        return $this;
    }
}