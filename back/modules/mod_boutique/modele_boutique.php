<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once './connexion.php';

class ModeleBoutique extends Connexion{

    public function __construct() {

    }


    private function executeQuery($stmt) {

        $stmt->execute();

        // Récupérez les résultats sous forme d'un tableau associatif
        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultats;
    }

    public function recupereTours() {
        try {
            $query = "
            SELECT nom,cout,src_image FROM Tour 
            ";
            $stmt = Connexion::$bdd->prepare($query);
            $tours = $this->executeQuery($stmt);

            return $tours;

        } catch (PDOException $e) {
            echo "<script>console.log('erreur:" . $e ."');</script>";
            return $e;
        }
    }
}


?>