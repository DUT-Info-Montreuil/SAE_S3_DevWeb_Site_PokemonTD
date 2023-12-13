<?php
class Connexion{
    protected static $bdd;

    public static function initConnexion(){
        $url = 'mysql:dbname=dutinfopw201618;host=database-etudiants.iut.univ-paris8.fr';
        $user = 'dutinfopw201618';
        $password = 'hytytesa';

        try {
            self::$bdd = new PDO($url,$user,$password);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        } 
    }
}
?>