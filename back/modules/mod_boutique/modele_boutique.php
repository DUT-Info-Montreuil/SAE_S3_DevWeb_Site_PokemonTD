<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once './connexion.php';

class ModeleBoutique extends Connexion{

    public function __construct() {

    }


    private function executeQuery($stmt) {

        $stmt->execute();

        // Récupérez les résultats sous forme d'un tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function recupereTours() {
        try {
            $query = "
            SELECT id_tour,nom,cout,src_image FROM Tour 
            ";
            $stmt = Connexion::$bdd->prepare($query);
            return $this->executeQuery($stmt);

        } catch (PDOException $e) {
            echo "<script>console.log('erreur:" . $e ."');</script>";
            return $e;
        }
    }

    public function recupereToursSelonJoueur($idJoueur) {
        try {
            $query = "
            SELECT id_tour,nom,cout,src_image FROM Tour 
            EXCEPT
            SELECT id_tour,nom,cout,src_image FROM Tour
            NATURAL JOIN TourPossedee
            WHERE id_joueur = $idJoueur
            ";
            $stmt = Connexion::$bdd->prepare($query);
            return $this->executeQuery($stmt);

        } catch (PDOException $e) {
            echo "<script>console.log('erreur:" . $e ."');</script>";
            return $e;
        }
    }

    public function getSolde($idJoueur)
    {
        try {
            $query = "
            SELECT sum(gain) as argentGagne
            FROM Historique 
            NATURAL JOIN NiveauJouable 
            WHERE id_joueur = $idJoueur 
            ";
            $stmt = Connexion::$bdd->prepare($query);
            $gain = $this->executeQuery($stmt);
            $gain = isset($gain[0]['argentGagne']) ? $gain[0]['argentGagne'] : 0;

            $query = "
            SELECT sum(Tour.cout) as perte
            FROM TourPossedee
            NATURAL JOIN Tour
            WHERE id_joueur = $idJoueur
            ";
            $stmt = Connexion::$bdd->prepare($query);
            $perte = $this->executeQuery($stmt)[0]['perte'];
            $perte = isset($perte[0]['perte']) ? $perte[0]['perte'] : 0;

            return $gain - $perte;
        } catch (PDOException $e) {
            echo "<script>console.log('erreur:" . $e ."');</script>";
            return -1;
        }
    }

    public function achatTour($idTour, $id_joueur)
    {
        try {
            $query = "
            INSERT INTO dutinfopw201618.TourPossedee(id_joueur, id_tour, date_acquisition)
            VALUE ($id_joueur,$idTour,NOW())
            ";
            $stmt = Connexion::$bdd->prepare($query);
            return $this->executeQuery($stmt);
        } catch (PDOException $e) {
            echo $e;
            return -1;
        }
    }

    public function getInfoTour($idTour)
    {
        try {
            $query = "
            SELECT T.cout,T.src_image,T.nom,D.description_effet,D.nom_effet,
                   S.*,C.*,D.*
            FROM dutinfopw201618.Tour T
            INNER JOIN dutinfopw201618.StatTour S ON T.id_tour = S.id_tour
            LEFT OUTER JOIN dutinfopw201618.Competence C ON S.id_competence = C.id_competence
            LEFT OUTER JOIN dutinfopw201618.EffetPossede E ON T.id_tour = E.id_tour
            LEFT OUTER JOIN dutinfopw201618.DetailEffet D ON E.id_effet = D.id_effet
            WHERE T.id_tour = $idTour
            ";
            $stmt = Connexion::$bdd->prepare($query);
            return $this->executeQuery($stmt)[0];
        } catch (PDOException $e) {
            echo $e;
            return -1;
        }
    }
}