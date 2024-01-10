<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once './back/modules/Connexion.php';

class ModeleEquipe extends Connexion {

    public function __construct() {

    }


    private function executeQuery($stmt) {

        $stmt->execute();

        // Récupérez les résultats sous forme d'un tableau associatif
        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultats;
    }

    public function toursPossedees($idJoueur){
        $requete_prepare = Connexion::$bdd->prepare("SELECT * FROM TourPossedee WHERE id_joueur=?");
        $requete_prepare->bindParam(1, $idJoueur);
        $requete_prepare->execute();
        $resultat = $requete_prepare->fetchAll();

        return $resultat;

        //echo var_dump($resultat);
    }
}


?>