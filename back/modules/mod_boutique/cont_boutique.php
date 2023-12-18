<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once "modele_boutique.php" ;
require_once "vue_boutique.php" ;

class ContBoutique {

    private $vue;
    private $modele;
    
    public function __construct(){

        $this->vue = new VueBoutique();
        $this->modele = new ModeleBoutique();

    }

    public function affichage() {
        return $this->vue->getAffichage();
    }

    public function afficheBoutique(){

        if ($_SESSION['id_joueur']){
            var_dump($_SESSION['id_joueur']);
            $tours = $this->modele->recupereToursSelonJoueur($_SESSION['id_joueur']);
        }else{
            $tours = $this->modele->recupereTours();  
        }

        $this->vue->boutique($tours);
    }

}
?>