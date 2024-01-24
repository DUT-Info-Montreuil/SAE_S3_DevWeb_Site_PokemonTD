<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once './connexion.php';

class ModeleCarte extends Connexion {

    public function __construct() {

    }

    private function executeQuery($stmt) {

        $stmt->execute();

        // Récupérez les résultats sous forme d'un tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}