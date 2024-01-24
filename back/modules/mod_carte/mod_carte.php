<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once "cont_carte.php" ;

class ModCarte {

    private $action;
    private $controlleur;

    public function __construct(){

        $this->controlleur = new ContCarte();
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'bienvenue';

        $this->start();

    }

    private function start(){

        switch($this->action){

            case'historique':
                $this->controlleur->afficheHistorique();
                break;
            case 'carte':
            default:
                $this->controlleur->carte();
                break;
        }
    }

    public function afficheModule(){
        return $this->controlleur->affichage();
    }

}