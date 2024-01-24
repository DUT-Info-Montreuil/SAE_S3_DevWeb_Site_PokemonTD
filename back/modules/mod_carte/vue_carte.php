<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once './back/vue_generique.php';

class VueCarte extends VueGenerique {

    public function __construct() {
        parent::__construct();
    }

    public function afficheCarte()
    {
        require_once ('./front/carte/carte.php');
    }


}