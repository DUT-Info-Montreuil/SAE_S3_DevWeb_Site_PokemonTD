<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once './back/modules/Connexion.php';

class ModeleConnexion extends Connexion {

    public function __construct() {

    }


    public function genereToken($var){
            $string = "";
            $chaine = "a0b1c2d3e4f5g6h7i8j9klmnpqrstuvwxy123456789";
            srand((double)microtime()*1000000);
            for($i=0; $i<$var; $i++){
                $string .= $chaine[rand()%strlen($chaine)];
            }
            $_SESSION['token'] = $string;

            return $string;
    }
    

    private function executeQuery($stmt) {

        $stmt->execute();

        // Récupérez les résultats sous forme d'un tableau associatif
        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultats;
    }
}


?>