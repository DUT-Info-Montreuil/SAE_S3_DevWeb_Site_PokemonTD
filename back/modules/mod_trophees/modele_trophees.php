<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once './connexion.php';

class ModeleTrophees extends Connexion {

    public function __construct() {

    }


    private function executeQuery($stmt) {

        $stmt->execute();

        // Récupérez les résultats sous forme d'un tableau associatif
        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultats;
    }

    public function recupereTrophees($poss){
        if ($poss == 0) {
            $query ="SELECT * from Trophee";
        }elseif ($poss == 1) {
            $query ="SELECT * from Trophee T INNER JOIN TropheeObtenu TOb ON T.id_trophee= TOb.id_trophee where id_joueur=". $_SESSION['id_joueur'];
        }else{
            return -1; 
        }

        try {
            $stmt = Connexion::$bdd->prepare($query);
            $res =$this->executeQuery($stmt);
            if(empty($res))
            $res = -2;
            return $res;
        } catch (PDOException $e) {
            return -1;
        }
        
    }
}


?>