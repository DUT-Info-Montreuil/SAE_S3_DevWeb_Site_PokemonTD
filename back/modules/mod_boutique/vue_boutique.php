<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once './back/vue_generique.php';

class VueBoutique extends VueGenerique
{

    public function __construct()
    {
        parent::__construct();
    }

    public function boutique($tableau, $solde, $token)
    {
        require_once('./front/boutique/boutique.php');
    }

    public function afficheDetailTour($infoTour)
    {
        require_once('./front/boutique/infoTour.php');
    }

    public function afficheErreur($detail)
    {
        echo "<p class='messageErreur'>Erreur $detail</p>";
    }

}