<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once './back/vue_generique.php';

class VueTrophees extends VueGenerique {

    public function __construct() {
        parent::__construct();
    }

    public function afficheErreur($code){
        switch ($code) {
            case '1' :
                echo 'Pas de Trophées existants';
                break;
            case '404':
                echo "Erreur 404, cette page n'éxiste pas ! <br> " ;
                break;
            default:
                echo 'Erreur';             
                break;
        
        }

        echo "redirection... <meta http-equiv='refresh' content= '3;url=index.php'>"; // redirection sur l'accueil
    }

    public function afficheTrophees($trophees,$poss){
        require_once './front/trophees/afficheTrophees.php';
    }

}


?>