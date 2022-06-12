<?php
namespace App\Banque;

use App\Client\Compte as CompteClient;

/**
 * Compte bancaire (hérite de Compte)
 */
class CompteCourant extends Compte
{
    private $decouvert;
    
    /**
     * Constructeur de compte courant
     *
     * @param CompteClient $compte Compte client du titulaire
     * @param float $montant Montant du solde à l'ouverture
     * @param integer $decouvert Découvert autorisé
     * @return void
     */
    public function __construct(CompteClient $compte, float $montant, int $decouvert)
    {
        //on transfert les informations nécessaires au contructeur de Compte
        parent::__construct($compte, $montant);

        $this->decouvert = $decouvert;
    }

    public function getDecouvert():int
    {
        return $this->decouvert;
    }

    public function setDecouvert(int $montant): self
    {
        if($montant > 0){
            $this->decouvert = $montant;
        }
        return $this;
    }

    public function retirer($montant)
    {
            // On vérifie si le découvert permet le retrait
            if($montant > 0 && $this->solde - $montant >= -$this->decouvert){
                $this->solde -= $montant;
            }else{
                echo "Montant invalide ou solde insuffisant";
            }
    }
}