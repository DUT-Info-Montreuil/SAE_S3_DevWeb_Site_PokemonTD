<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once "cont_boutique.php";


class ModBoutique
{

    private $action;
    private $controlleur;

    public function __construct()
    {

        $this->controlleur = new ContBoutique();
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'afficheBoutique';

        $this->start();

    }

    private function start()
    {

        switch ($this->action) {

            case 'afficheBoutique':
                $this->controlleur->afficheBoutique();
                break;
            case 'achat':
                $this->controlleur->achatTour();
                break;
            case 'detailTour':
                $this->controlleur->detailTour();
                break;
        }
    }

    public function afficheModule()
    {
        return $this->controlleur->affichage();
    }

}

?>