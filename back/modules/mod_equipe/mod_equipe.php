<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once "cont_equipe.php" ;

class ModEquipe {

    private $action;
    private $controleur;

    public function __construct(){

        $this->controleur = new ContEquipe();
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'toursPossedees';

        $this->start();

    }

    private function start(){

        switch($this->action){
/*
            case 'bienvenue':
                $this->controlleur->bienvenue();
                break;*/
            case 'javacriptTest':
                $this->controleur->lancement(1);
                break;
            case 'toursPossedees':
                $this->controleur->toursPossedees(1);
                break;
            case 'traitement_tour_equipe':
                $this->controleur->traitement_ajout_equipe();
                break;
                
            
        }
    } 

    public function afficheModule(){
        return $this->controleur->affichage();
    }

}

?>