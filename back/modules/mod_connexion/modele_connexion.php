<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once './connexion.php';

class ModeleConnexion extends Connexion
{

    public function __construct()
    {

    }

    public function ajoutUser()
    {
        try {
            $stmt = Connexion::$bdd->prepare("SELECT * from Joueur where pseudo ='" . $_POST['login'] . "';");
            $this->executeQuery($stmt);
        } catch (PDOException $e) {
            return $e;
        }
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if ($stmt->rowCount() == 0) {
            try {
                $stmt = Connexion::$bdd->prepare("INSERT INTO Joueur(pseudo ,mot_de_passe ) VALUES ('" . $_POST['login'] . "','" . $password . "');");
                $this->executeQuery($stmt);
                echo "<meta http-equiv='refresh' content= '2;url=index.php'>";

            } catch (PDOException $e) {
                return $e;
            }
        } else {
            return -1;
        }

        echo '<script type ="text/javascript"> history.go(-2);</script>;';


    }

    private function executeQuery($stmt)
    {

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function connexionUser()
    {
        try {
            $stmt = Connexion::$bdd->prepare("SELECT * from Joueur where pseudo ='" . $_POST['login'] . "';");
            $res = $this->executeQuery($stmt);
        } catch (PDOException $e) {
            return $e;
        }

        if ($stmt->rowCount() == 1) {
            if (password_verify($_POST['password'], $res[0]["mot_de_passe"])) {
                $_SESSION['id_joueur'] = $res[0]["id_joueur"];
                $_SESSION['pseudo'] = $res[0]["pseudo"];
                $_SESSION['moderateur'] = $res[0]["moderateur"];


            }
        } else {
            return -1;
        }

        echo '<script type ="text/javascript"> history.go(-2);</script>;';


    }

    public function deconnexion()
    {
        session_destroy();
        header("Location: ./index.php");
        //echo '<script type ="text/javascript"> history.go(-1);</script>;';
    }
}