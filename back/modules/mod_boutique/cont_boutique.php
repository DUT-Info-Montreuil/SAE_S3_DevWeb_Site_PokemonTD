<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once "modele_boutique.php" ;
require_once "vue_boutique.php" ;

class ContBoutique {

    private $vue;
    private $modele;
    
    public function __construct(){

        $this->vue = new VueBoutique();
        $this->modele = new ModeleBoutique();

    }

    public function affichage() {
        return $this->vue->getAffichage();
    }

    public function afficheBoutique(){

        if ( isset($_SESSION['id_joueur']) ){
            $tours = $this->modele->recupereToursSelonJoueur($_SESSION['id_joueur']);
        }else{
            $tours = $this->modele->recupereTours();  
        }

        $solde = $this->modele->getSolde($_SESSION['id_joueur']);

        $this->vue->boutique($tours,$solde);
    }

    public function achatTour()
    {
        if (isset($_GET['idTour'])){
            $idTour = $_GET['idTour'];
            $res = $this->modele->achatTour($idTour,$_SESSION['id_joueur']);
            if ($res == -1)
                echo "<p>erreur insertion</p>";
            else
                header('Location: index.php?module=mod_boutique');
        }
    }

    public function detailTour()
    {
        if (isset($_GET['idTour'])){
            $idTour = $_GET['idTour'];
            $infoTour = $this->modele->getInfoTour($idTour);

            if ($infoTour != -1)
                $this->vue->afficheDetailTour($infoTour);
            else
                echo "<p>Erreur</p>";
        }
    }

}