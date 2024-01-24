<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once "modele_carte.php" ;
require_once "vue_carte.php" ;

class ContCarte {

    private $vue;
    private $modele;
    
    public function __construct(){

        $this->vue = new VueCarte();
        $this->modele = new ModeleCarte();

    }

    public function affichage() {
        return $this->vue->getAffichage();
    }

    public function carte()
    {
        $this->vue->afficheCarte();

    }

}