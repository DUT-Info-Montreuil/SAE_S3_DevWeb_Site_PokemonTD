<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once "modele_equipe.php" ;
require_once "vue_equipe.php" ;

class ContEquipe {

    private $vue;
    private $modele;
    
    public function __construct(){

        $this->vue = new VueEquipe();
        $this->modele = new ModeleEquipe();

    }

    public function affichage() {
        return $this->vue->getAffichage();
    }

}
?>