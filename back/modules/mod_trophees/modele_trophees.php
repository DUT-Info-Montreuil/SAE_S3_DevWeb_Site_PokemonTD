<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once './connexion.php';

class ModeleTrophees extends Connexion {

    public function __construct() {

    }


    private function executeQuery($stmt) {

        $stmt->execute();

        // Récupérez les résultats sous forme d'un tableau associatif
        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultats;
    }

    public function recupereTrophees($poss){
        if ($poss == 0 ) {
            $query ="SELECT * from Trophee";
            
        }elseif ($poss == 1) {
            $query ="SELECT * from Trophee T INNER JOIN TropheeObtenu TOb ON T.id_trophee= TOb.id_trophee where id_joueur=". $_SESSION['id_joueur'];
        }else{
            return -1; 
        }

        try {
            $stmt = Connexion::$bdd->prepare($query);
            $res =$this->executeQuery($stmt);
            if(empty($res))
            $res = -2;
            return $res;
        } catch (PDOException $e) {
            return -1;
        }
        
    }

    public function ajoutTrophee($nom,$cond){
        echo $nom . " / " . $cond;

        $chemin= $this->gererLogo();
        if ($chemin == null){
            echo "erreur";
            return 7; // probleme image
        }
// ok jusque ici
        try{
            $stmt = Connexion::$bdd->prepare("SELECT nom FROM Trophee WHERE nom = '" . $nom . "'");
            $res=$this->executeQuery($stmt);
        }catch (PDOException $e) {
            var_dump($e);
            return false;
        }   

        if(count($res)==0){
            try{
                $query = "
                INSERT INTO Trophee (nom, condition_obtention, src_image)
                VALUES ('$nom','$cond','$chemin')
                ";
                $stmt = Connexion::$bdd->prepare($query);
                $stmt->execute();
            }catch (PDOException $e) {
                echo "<script>console.log('erreur: $e');</script>";
                return false;
            }      
        }else{
            return 6; // Un trophée porte déja ce nom.. 


        }

    }

    public function gererLogo()
    {
        $taille = strlen(basename($_FILES["logo"]["name"]));

        $taille> 20 ?
            $nom = substr(basename($_FILES["logo"]["name"]), -20) :
            $nom = basename($_FILES["logo"]["name"]);

        $temp_name = $_FILES["logo"]["tmp_name"];
        $destination = "./ressources/trophee/$nom";
        

        // Déplacer le fichier téléchargé vers un répertoire sur le serveur
        if (!move_uploaded_file($temp_name, $destination)){
            echo "Une erreur s'est produite lors du téléchargement de l'image.<br>";
            return null;
        }else
            return $destination;
    }

    
}


?>