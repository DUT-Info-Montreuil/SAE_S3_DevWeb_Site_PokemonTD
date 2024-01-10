<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once './connexion.php';

class ModeleConnexion extends Connexion {

    public function __construct() {

    }
    public function ajoutUser(){
        try {
            $stmt = Connexion::$bdd->prepare("SELECT * from Joueur where pseudo ='".$_POST['login']."';");
            $this->executeQuery($stmt);
        } catch (PDOException $e) {
            return $e;
        }
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

        if($stmt->rowCount()==0){
            try {
                $stmt = Connexion::$bdd->prepare("INSERT INTO Joueur(pseudo ,mot_de_passe ) VALUES ('".$_POST['login']."','".$password."');");
                $this->executeQuery($stmt);
                echo "<meta http-equiv='refresh' content= '2;url=index.php'>";

            } catch (PDOException $e) {
                return $e;
            }
        }else{
            return -1;            
        }

    }
    public function connexionUser(){
        try {
            $stmt = Connexion::$bdd->prepare("SELECT * from Joueur where pseudo ='".$_POST['login']."';");
            $res=$this->executeQuery($stmt);
        } catch (PDOException $e) {
            return $e;
        }

        if($stmt->rowCount()==1){
            if(password_verify($_POST['password'],$res[0]["mot_de_passe"])){
                $_SESSION['id_joueur']=$res[0]["id_joueur"];
                $_SESSION['pseudo']=$res[0]["pseudo"];
            }
        }else{
            return -1;
        }
    }

    public function genereToken($var){
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
    

    private function executeQuery($stmt) {

        $stmt->execute();

        // Récupérez les résultats sous forme d'un tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}