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

    public function toursPossedees($idJoueur){
        $tableau = $this->modele->toursPossedees($idJoueur);
        //echo "You rock!";
        //echo var_dump($t);
        
        //$this->vue->afficheTours($tableau);
        $this->vue->formulaireTour($tableau);
    }

    public function traitement_ajout_equipe(){
        echo var_dump($_POST);
        echo "<p>Good ! ???</p>";
        //TODO ici il faut s'assurer qu'il y a pad dinterfernce
        foreach($_POST as $element){
            echo "<p>{$element}</p>";
        }
        //echo
        /*
        if (isset($_POST['tour_1'])) { 
            echo "<p>HAHAHAHAHAHHAHA : {$_POST['tour_1']}</p>";
        }*/
    }

}
?>