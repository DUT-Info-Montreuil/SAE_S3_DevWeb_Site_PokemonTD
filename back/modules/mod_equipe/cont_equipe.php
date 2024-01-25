<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once "modele_equipe.php";
require_once "vue_equipe.php";

class ContEquipe
{

    private $vue;
    private $modele;

    public function __construct()
    {
        $this->vue = new VueEquipe();
        $this->modele = new ModeleEquipe();
    }

    public function affichage()
    {
        return $this->vue->getAffichage();
    }

    /*
    public function toursPossedees($idJoueur)
    {
        $tableau = $this->modele->toursPossedees($idJoueur);
        $this->vue->formulaireTour($tableau);
    }*/

    public function traitement_ajout_equipe()
    {
        if (isset($_SESSION['id_joueur'])) {
            $id_joueur = $_SESSION['id_joueur'];
            $nbPokemonSelectionne = isset($_POST) ? sizeof($_POST) : 0;
            if ($nbPokemonSelectionne <= 3) {
                $this->modele->supprimeEquipe($id_joueur);

                foreach ($_POST as $key => $id_tour) {
                    if($this->modele->possedeTour($id_joueur, $id_tour) == true){
                        $this->modele->inserePokemonEquipe($id_joueur, $id_tour);
                    }
                    else{
                        $this->modele->supprimeEquipe($id_joueur);
                        return -1;
                    }
                }
            }
            else{
                return -3;
            }
        }else{
            return -2;
        }
        echo var_dump($_POST);
        return 1;
    }
    public function issuAjoutEquipe($codeRetour){
        switch( $codeRetour) {
            case 1:
                $tab = $this->modele->equipeActuelle($_SESSION['id_joueur']);
                $this->vue->ajoutEquipeSucces($tab);
                break;
            case -1:
                $this->vue->messageErreur('equipeTraitementEquipe');
                break;
            case -2:
                $this->vue->messageErreur('equipeTraitementEquipeNonConnecte');
                break;
            case -3:
                $this->vue->messageErreur('equipeTraitementMaximum');
                break;
            default:
                $this->vue->messageErreur('inconnu');
                break;
        }
    }

    private function modificateurEquipe($idJoueur)
    {
        $tableau = $this->modele->toursPossedees($idJoueur);
        $equipeActuelle = $this->modele->equipeActuelle($idJoueur);
        $this->vue->equipeActuelle($equipeActuelle);
        $this->vue->toursDisponibles($tableau, count($equipeActuelle));
    }

    public function verifConnexion()
    {
        if (isset($_SESSION['id_joueur'])) {
            echo var_dump($_SESSION);
            $this->modificateurEquipe($_SESSION['id_joueur']);
        } else {
            $this->vue->acceuilNonConnecte();
        }
    }




}
?>