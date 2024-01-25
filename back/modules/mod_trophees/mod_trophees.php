<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once "cont_trophees.php";

class ModTrophees
{

    private $action;
    private $controlleur;

    public function __construct()
    {

        $this->controlleur = new ContTrophees();
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'bienvenue';

        $this->start();

    }

    private function start()
    {

        switch ($this->action) {

            case 'afficheTrophees':
                $this->controlleur->afficheTrophees(0);
                break;
            case 'afficheTropheesObtenus':
                $this->controlleur->afficheTrophees(1);
                break;
            case 'formAjoutTrophee':
                $this->controlleur->formAjoutTrophee();
                break;
            case 'ajouterTrophee':
                $this->controlleur->ajouterTrophee();
                break;
            default:
                $this->controlleur->erreur404();
        }
    }

    public function afficheModule()
    {
        return $this->controlleur->affichage();
    }

}
