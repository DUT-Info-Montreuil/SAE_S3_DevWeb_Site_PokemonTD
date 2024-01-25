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

    protected function genereToken($var)
    {
        $string = "";
        $chaine = "a0b1c2d3e4f5g6h7i8j9klmnpqrstuvwxy123456789";
        srand((double)microtime()*1000000);
        for($i=0; $i<$var; $i++){
            $string .= $chaine[rand()%strlen($chaine)];
        }
        $_SESSION['token'] = $string;
        $_SESSION['tokenCreation'] = time();

        return $string;
    }

    protected function verifieToken(){return (time()- $_SESSION['tokenCreation']  <= 180 && isset($_POST['token']) && $_POST['token']==$_SESSION['token'] ); }

}
