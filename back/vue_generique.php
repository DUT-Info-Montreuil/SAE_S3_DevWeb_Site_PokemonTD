<?php

class VueGenerique {

    public function __construct(){
        ob_start();
    }

    public function getAffichage() {
        return ob_get_clean();
    }

    public function messageErreur($typeErreur){
        $messageErreur = "Une erreur inconnue s'est produite";
        switch($typeErreur){
            case 'equipeTraitementEquipe':
                $messageErreur = "Une erreur s'est produite lors de l'ajout de l'équipe";
                break;
            case 'equipeTraitementEquipeNonConnecte':
                $messageErreur = "Vous devez être connecté pour enregister votre équipe";
                break;
            case 'equipeTraitementMaximum':
                $messageErreur = "Équipe est de taille maximale de 3";
                break;
            default:
                $messageErreur = "Une erreur inconnue s'est produite";
                break;
        }

        echo "<p class=messageErreur>{$messageErreur}<p/>";
        
    }

}
?>