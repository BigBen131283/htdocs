<?php

namespace App\Banque;

use App\Client\Compte as CompteClient;

/**
 * Compte avec taux d'intérêt
 */
class CompteEpargne extends Compte
{
    /**
     * Taux d'intérêts du compte
     *
     * @var float
     */
    private $taux_interets;

    /**
     * Constructeur du compte épargne
     *
     * @param CompteClient $compte Compte client du Titutaire
     * @param float $montant Montant du solde à l'ouverture
     * @param float $taux Taux d'intérêt
     */
    public function __construct(CompteClient $compte, float $montant, float $taux)
    {
        // On transfère les valeurs nécessaires au constructeur parent
        parent::__construct($compte, $montant);

        $this->taux_interets = $taux;
    }

    /**
     * Get taux d'intérêts du compte 
     *
     * @return float
     */
    public function getTauxInterets(): float
    {
        return $this->taux_interets;
    }

    /**
     * Set taux d'intérêt du compte
     *
     * @param float $taux_interets Taux d'intérêts du compte
     * @return self
     */
    public function setTauxInterets(float $taux_interets): self
    {
        if($taux_interets >= 0){
            $this->taux_interets = $taux_interets;
        }
        return $this;     
    }

    public function verserInterets(){
        $this->solde = $this->solde + ($this->solde * $this->taux_interets)/ 100;
    }
}