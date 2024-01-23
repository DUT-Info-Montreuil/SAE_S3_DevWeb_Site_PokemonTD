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
        $id_joueur = 1;
        $nbPokemonSelectionne = isset($_POST) ? sizeof($_POST) : 0;

        //echo var_dump($_POST);
       // echo "<p>{$nbPokemonSelectionne}</p>";
        
        if($nbPokemonSelectionne <= 3){
            $this->modele->supprimeEquipe($id_joueur);

            foreach ($_POST as $key => $id_tour) {
                $this->modele->inserePokemonEquipe($id_joueur, $id_tour);
            }
        }
    }

    public function lancement($idJoueur){
        $tableau = $this->modele->toursPossedees($idJoueur);
        echo var_dump($tableau);
        $this->vue->equipeActuelle();
        $this->vue->toursDisponibles($tableau);
        //$this->vue->formulaireTour($tableau);$tableau
    }

}
?>