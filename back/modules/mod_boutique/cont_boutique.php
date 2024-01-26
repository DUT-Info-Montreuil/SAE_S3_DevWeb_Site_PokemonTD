<?php

use Random\RandomException;

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once "modele_boutique.php";
require_once "vue_boutique.php";

class ContBoutique
{

    private $vue;
    private $modele;

    public function __construct()
    {

        $this->vue = new VueBoutique();
        $this->modele = new ModeleBoutique();

    }

    public function affichage(): false|string
    {
        return $this->vue->getAffichage();
    }

    /**
     * @throws RandomException
     */
    public function afficheBoutique(): void
    {

        if (isset($_SESSION['id_joueur'])) {
            $tours = $this->modele->recupereToursSelonJoueur($_SESSION['id_joueur']);
            $solde = $this->modele->getSolde($_SESSION['id_joueur']);
        } else {
            $tours = $this->modele->recupereTours();
            $solde = 0;
        }

        $token = $this->modele->genereToken();

        $this->vue->boutique($tours, $solde, $token);
    }

    public function achatTour(): void
    {
        if ($this->modele->verifieToken($_GET['token'])) {
            if (isset($_GET['idTour'])) {
                $idTour = $_GET['idTour'];
                $res = $this->modele->achatTour($idTour, $_SESSION['id_joueur']);
                if ($res == -1)
                    $this->vue->afficheErreur("insertion");
                else
                    header('Location: index.php?module=mod_boutique');
            }
        } else
            $this->vue->afficheErreur("token invalide ou expiré");
    }

    /**
     * @throws RandomException
     */
    public function detailTour(): void
    {
        if (isset($_GET['idTour'])) {
            $idTour = $_GET['idTour'];
            $infoTour = $this->modele->getInfoTour($idTour);
            $token = $this->modele->genereToken();

            if ($infoTour != -1)
                $this->vue->afficheDetailTour($infoTour, $token);
            else
                $this->vue->afficheErreur("");
        }
    }

}