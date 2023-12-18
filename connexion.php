<?php
class Connexion{
    protected static $bdd;

    public static function initConnexion(){
        $url = 'mysql:dbname=dutinfopw201618;host=database-etudiants.iut.univ-paris8.fr';
        $user = 'dutinfopw201618';
        $password = 'hytytesa';
        self::$bdd = new PDO($url,$user,$password);
    }
}
?>