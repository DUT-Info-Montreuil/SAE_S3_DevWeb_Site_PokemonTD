<?php
class Connexion{
    protected static $bdd;

    public static function initConnexion(){
        $url = 'mysql:dbname=dutinfopw201618;host=database-etudiants.iut.univ-paris8.fr';
        $user = 'dutinfopw201618';
        $password = 'hytytesa';

        // mysql -h database-etudiants.iut.univ-paris8.fr -u dutinfopw201618 -p

        try {
            self::$bdd = new PDO($url,$user,$password);

            // Configurer PDO pour générer des exceptions en cas d'erreurs SQL
            self::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        } 
    }
}
?>