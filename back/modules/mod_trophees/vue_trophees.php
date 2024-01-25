<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once './back/vue_generique.php';

class VueTrophees extends VueGenerique {

    public function __construct() {
        parent::__construct();
    }

    

    public function afficheTrophees($trophees,$poss){
        require_once './front/trophees/afficheTrophees.php';
    }

    public function formAjoutTrophee($token){
        include_once './front/trophees/formAjoutTrophees.php';
    }



public function afficheErreur($code){
        switch ($code) {
            case '1' :
                echo '<p class=""></p>Pas de Trophées existants';
                break;
            case '2' :
                echo ' Remplissez tout les champs !';
                break;
            case '3' :
                echo ' probleme de base de données, contactez le support si le probleme persiste';
                break;
            case '5' :
                echo 'probleme de token : token expiré !';
                break;
            case '6' :
                echo 'Un trophée porte déja ce nom !';
                break;
            case '7' :
                echo "Probleme avec la gestion de l'image !";
                break;
            case '404':
                echo "Erreur 404, cette page n'éxiste pas ! <br> " ;
                break;
            default:
                echo 'Erreur';             
                break;
        
        }

        echo "<br> redirection... <meta http-equiv='refresh' content= '3;url=index.php'>"; // redirection sur l'accueil
    }



}


?>