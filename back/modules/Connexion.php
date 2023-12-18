<?php

class Connexion {

    protected static $bdd;

    public function __construct() {
        

    }

    public static function initConnexion() {
        $url='mysql:dbname=dutinfopw201618;host=database-etudiants.iut.univ-paris8.fr';
        $user='dutinfopw201618';
        $password='hytytesa';
        try {
             self::$bdd =new PDO ($url,$user,$password);
             if(isset(self::$bdd)){
                echo "cest ok";
             } else{
                echo"non";
             }

            // // Configurer PDO pour générer des exceptions en cas d'erreurs SQL
            // Connexion::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }  
    }

}

?>