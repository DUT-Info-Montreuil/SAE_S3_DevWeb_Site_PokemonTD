<?php

class Connexion {

    protected static $bdd;

    public function __construct() {

    }

    public static function initConnexion() {

        try {
            // Connexion::$bdd = 

            // // Configurer PDO pour générer des exceptions en cas d'erreurs SQL
            // Connexion::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }  
    }

}

?>