<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once "modele_placehorder.php";
require_once "vue_placehorder.php";

class ContPlacehorder
{

    private $vue;
    private $modele;

    public function __construct()
    {

        $this->vue = new VuePlacehorder();
        $this->modele = new ModelePlacehorder();

    }

    public function affichage()
    {
        return $this->vue->getAffichage();
    }

}

?>