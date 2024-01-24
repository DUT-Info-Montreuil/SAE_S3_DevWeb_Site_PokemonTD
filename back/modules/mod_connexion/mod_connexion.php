<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once "cont_connexion.php" ;

class ModConnexion {

    private $action;
    private $controlleur;

    public function __construct(){

        $this->controlleur = new ContConnexion();
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'bienvenue';

        $this->start();

    }

    private function start(){

        switch($this->action){

            case 'bienvenue':
                echo"bienvenue";
                break;
            case 'lien_inscription':
                $this->controlleur->lienInscription();
                break;
            case 'insertion_compte':
                $this->controlleur->insertionCompte();
                break;
            case 'lien_connexion':
                $this->controlleur->lienConnexion();
                break;
            case 'connexion_compte':
                $this->controlleur->connexionCompte();
                break;
            case 'deconnexion' :
                $this->controlleur->deconnexion();
                break;
        }
    }

    public function afficheModule(){
        return $this->controlleur->affichage();
    }

}

?>