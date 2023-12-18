<?php

class Connexion {

    protected static $bdd;

    public function __construct() {

    }

    public static function initConnexion() {
        $url = 'mysql:dbname=dutinfopw201618;host=database-etudiants.iut.univ-paris8.fr';
        $user = 'dutinfopw201618';
        $password = 'hytytesa';

        try {
            // Connexion::$bdd = 

            // // Configurer PDO pour générer des exceptions en cas d'erreurs SQL
            // Connexion::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            self::$bdd = new PDO($url,$user,$password);
            /*
            echo "<p>TABARNAK haha</p>";

            $requete_prepare = Connexion::$bdd->prepare("SELECT * FROM Tour");
            //$requete_prepare->bindParam(1, $login);
            $requete_prepare->execute();
            $resultat = $requete_prepare->fetch();

            echo var_dump($resultat);*/
            

        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }  
    }

}

?>