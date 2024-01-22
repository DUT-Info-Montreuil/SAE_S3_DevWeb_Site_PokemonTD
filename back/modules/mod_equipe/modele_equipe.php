<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once './connexion.php';

class ModeleEquipe extends Connexion {

    public function __construct() {

    }

    private function executeQuery($stmt) {

        $stmt->execute();

        // Récupérez les résultats sous forme d'un tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function toursPossedees($idJoueur){
        $requete_prepare = Connexion::$bdd->prepare("SELECT * FROM TourPossedee WHERE id_joueur=?");
        $requete_prepare->bindParam(1, $idJoueur);
        $requete_prepare->execute();
        $resultat = $requete_prepare->fetchAll();

        return $resultat;
        //echo var_dump($resultat);
    }

    public function inserePokemonEquipe($idJoueur, $idTour){
        //INSERT INTO Equipe(id_joueur, id_tour) VALUES (1, 1)
        $requete_prepare = Connexion::$bdd->prepare("INSERT INTO Equipe(id_joueur, id_tour) VALUES (?,?)");
        $requete_prepare->bindParam(1, $idJoueur);
        $requete_prepare->bindParam(2, $idTour);
        $requete_prepare->execute();
    }

    public function supprimeEquipe($idJoueur){
        //DELETE FROM Equipe WHERE id_joueur=0;
        $requete_prepare = Connexion::$bdd->prepare("DELETE FROM Equipe WHERE id_joueur=?");
        $requete_prepare->bindParam(1, $idJoueur);
        $requete_prepare->execute();
        //$resultat = $requete_prepare->fetchAll();

        //return $resultat;
    }
}


?>