<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once "modele_connexion.php" ;
require_once "vue_connexion.php" ;

class ContConnexion {

    private $vue;
    private $modele;
    
    public function __construct(){
        $this->vue = new VueConnexion();
        $this->modele = new ModeleConnexion();
    }


    public function lienInscription(){
        $tok= $this->modele->genereToken(20);
        $this->vue->formInscription($tok);
    }

    public function affichage() {
        return $this->vue->getAffichage();
    }

}
?>