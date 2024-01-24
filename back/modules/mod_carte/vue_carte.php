<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once './back/vue_generique.php';

class VueCarte extends VueGenerique {

    public function __construct() {
        parent::__construct();
    }

    public function afficheCarte($niveauDejaJoue)
    {
        require_once ('./front/carte/carte.php');
    }

    public function afficheHistorique($info,$historique)
    {
        require_once ('./front/carte/historique.php');
    }


}