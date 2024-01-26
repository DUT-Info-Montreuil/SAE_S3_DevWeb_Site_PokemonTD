<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once "modele_carte.php";
require_once "vue_carte.php";

class ContCarte
{

    private $vue;
    private $modele;

    public function __construct()
    {
        $this->vue = new VueCarte();
        $this->modele = new ModeleCarte();
    }

    public function affichage(): false|string
    {
        return $this->vue->getAffichage();
    }

    public function carte(): void
    {

        if ($_SESSION['estConnecter'])
            $niveauDejaJoue = $this->modele->recupNiveauJoue($_SESSION['id_joueur']);
        else
            $niveauDejaJoue = NULL;

        $this->vue->afficheCarte($niveauDejaJoue);

    }

    public function afficheHistorique(): void
    {
        if (isset($_GET['idCarte']) && $_SESSION['estConnecter']) {
            $idCarte = $_GET['idCarte'];
            $info = $this->modele->recupInfoCarte($idCarte);
            $historique = $this->modele->recupHistorique($idCarte, $_SESSION['id_joueur']);
            $this->vue->afficheHistorique($info, $historique);
        }
    }

}