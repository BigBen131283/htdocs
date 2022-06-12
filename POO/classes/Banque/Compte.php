<?php

namespace App\Banque;

use App\Client\Compte as CompteClient;

/**
 * objet Compte
 */
abstract class Compte 
{
    //propriétés
    /**
     * titulaire du compte
     *
     * @var CompteClient
     */
    private CompteClient $titulaire;
    // public $titulaire;
    
    // private ne peut pas être lue de l'extérieur
    // protected lié à la notion d'héritage

    /**
     * Solde du compte
     *
     * @var float
     */
    protected $solde;

    //constantes
    // const TAUX_INTERETS = 5; Sera maintenant liée à la classe compte épargne

    /**
     * Constructor du compte bancaire
     *
     * @param CompteClient $compte Compte client du titulaire
     * @param float $montant Montant du solde à l'ouverture
     */
    public function __construct(CompteClient $compte, float $montant = 100) //d'habitude on utilise le même nom que la propriété mais là on le fait pas
                                                                   //=100 on attribue une valeur par défaut à $montant
                                                                   // On injecte la classe compteclient qui peut être modifiée 
    {
        //on attribue le nom à la propriété titulaire de l'instance créée
        $this->titulaire = $compte;  
        
        //on attribue le montant à la propriété solde
        $this->solde = $montant; //+ ($montant * self::TAUX_INTERETS/100); //Sera maintenant liée à la classe compte épargne
    }

    //Accesseurs

    /**
     * Getter de Titulaire - Retourne la valeur du titulaire du compte
     *
     * @return CompteClient
     */
    public function getTitulaire(): CompteClient
    {
        return $this->titulaire;
    }

    /**
     * Modifie le compte du titulaire et retourne l'objet
     *
     * @param CompteClient $compte Compte client du titulaire
     * @return Compte Compte bancaire
     */
    public function setTitulaire(CompteClient $compte): self
    {
        //on vérifie si on a un titulaire
        if(isset($compte)){
            $this->titulaire = $compte;
        }
        return $this;
    }

    /**
     * Retourne le solde du compte
     *
     * @return float solde du compte
     */
    public function getSolde(): float
    {
        return $this->solde;
    }

    /**
     * Modifie le solde du compte
     *
     * @param float $montant Montant du solde
     * @return Compte Compte bancaire
     */
    public function setSolde(float $montant): self
    {
        if($montant >= 0){
            $this->solde = $montant;
        }
        return $this;
    }

    //Méthodes
    /**
     * Déposer de l'argent sur le compte
     *
     * @param float $montant Montant déposé
     * @return void
     */
    public function deposer(float $montant)
    {
        // on vérifie si le montant est positif
        if($montant > 0){
            $this->solde += $montant;
        }
    }

    /**
     * Retourne une chaîne de caractères affichant le solde
     *
     * @return string
     */
    public function voirSolde()
    {
        return "Le solde du compte est de $this->solde";
    }

    /**
     * Retirer de l'argent
     *
     * @param float $montant montant à retirer
     * @return void
     */
    public function retirer(float $montant)
    {
        // On vérifie le montant et le solde
        if($montant > 0 && $this->solde >= $montant){
            $this->solde -= $montant;
        }else{
            echo "Montant invalide ou solde insuffisant";
        }
    }
}

?>