<?php

use Random\RandomException;

class Connexion
{
    protected static $bdd;

    public static function initConnexion()
    {
        $url = 'mysql:dbname=dutinfopw201618;host=database-etudiants.iut.univ-paris8.fr';
        $user = 'dutinfopw201618';
        $password = 'hytytesa';
        try {
            self::$bdd = new PDO($url, $user, $password);
            self::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    /**
     * @throws RandomException
     */
    public function genereToken(): string
    {
        $string = bin2hex(random_bytes(32));
        $_SESSION['token'] = $string;
        $_SESSION['tokenCreation'] = time();
        return $string;
    }

    public function verifieToken($tokenAverifier): bool
    {
        $result = time() - $_SESSION['tokenCreation'] <= 600 && isset($tokenAverifier) && $tokenAverifier == $_SESSION['token'];
        unset($_SESSION['token']);
        unset($_SESSION['tokenCreation']);
        return $result;
    }

}
