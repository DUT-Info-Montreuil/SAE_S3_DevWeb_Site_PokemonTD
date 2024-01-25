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
            case '1' :
                $messageErreur = ' Pas de Trophées existants';
                break;
            case '2' :
                $messageErreur = ' Remplissez tout les champs !';
                break;
            case '3' :
                $messageErreur = ' probleme de base de données, contactez le support si le probleme persiste';
                break;
            case '5' :
                $messageErreur = 'probleme de token : token expiré !';
                break;
            case '6' :
                $messageErreur = 'Un trophée porte déja ce nom !';
                break;
            case '7' :
                $messageErreur = "Probleme avec la gestion de l'image !";
                break;
            case '404':
                $messageErreur = "Erreur 404, cette page n'éxiste pas ! <br> " ;
                break;
            default:
                $messageErreur = "Une erreur inconnue s'est produite";
                break;
        }

        echo "<p class=messageErreur>{$messageErreur}<p/>";
        
    }

}

?>