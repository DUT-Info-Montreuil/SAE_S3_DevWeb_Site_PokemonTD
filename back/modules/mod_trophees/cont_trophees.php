<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once "modele_trophees.php" ;
require_once "vue_trophees.php" ;

class ContTrophees {

    private $vue;
    private $modele;
    
    public function __construct(){
        $this->vue = new VueTrophees();
        $this->modele = new ModeleTrophees();
    }

    public function erreur404(){
        $this->vue->afficheErreur(404);
    }

    public function afficheTrophees($poss){
       $troph =$this->modele->recupereTrophees($poss);

        if($troph !=-1){    
            $this->vue->afficheTrophees($troph,$poss);
        }else {
            $this->vue->afficheErreur(1);
        }
    }
    public function affichage() {
        return $this->vue->getAffichage();
    }

}
