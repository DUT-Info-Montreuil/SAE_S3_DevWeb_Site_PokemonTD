<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once "cont_equipe.php";

class ModEquipe
{

    private $action;
    private $controleur;

    public function __construct()
    {

        $this->controleur = new ContEquipe();
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'lancement';

        $this->start();

    }

    private function start()
    {
        switch ($this->action) {
            case 'lancement':
                $this->controleur->verifConnexion();
                break;
            case 'traitement_tour_equipe':
                $codeRetour = $this->controleur->traitement_ajout_equipe();
                $this->controleur->issuAjoutEquipe($codeRetour);
                break;
        }
    }

    public function afficheModule()
    {
        return $this->controleur->affichage();
    }

}

?>