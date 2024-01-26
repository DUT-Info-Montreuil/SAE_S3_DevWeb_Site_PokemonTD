<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once './connexion.php';

class ModeleEquipe extends Connexion
{

    public function __construct()
    {

    }

    public function toursPossedees($idJoueur)
    {
        $requete_prepare = Connexion::$bdd->prepare("SELECT * FROM TourPossedee INNER JOIN Tour USING(id_tour) WHERE id_joueur=? ORDER BY nom");
        $requete_prepare->bindParam(1, $idJoueur);
        $requete_prepare->execute();
        $resultat = $requete_prepare->fetchAll();

        //Pour verifier si dans equipe
        foreach ($resultat as &$ligne) {
            $id_tour = $ligne['id_tour'];
            $ligne['estDansEquipe'] = $this->estDansEquipe($idJoueur, $id_tour);
        }

        return $resultat;
    }

    public function estDansEquipe($idJoueur, $idTour)
    {
        $requete_prepare = Connexion::$bdd->prepare("SELECT * FROM Equipe WHERE id_joueur=? AND id_tour=?");
        $requete_prepare->bindParam(1, $idJoueur);
        $requete_prepare->bindParam(2, $idTour);
        $requete_prepare->execute();
        $nbResultats = $requete_prepare->rowCount();

        if ($nbResultats == 1) {
            return true;
        }

        return false;
    }

    public function inserePokemonEquipe($idJoueur, $idTour)
    {
        $requete_prepare = Connexion::$bdd->prepare("INSERT INTO Equipe(id_joueur, id_tour) VALUES (?,?)");
        $requete_prepare->bindParam(1, $idJoueur);
        $requete_prepare->bindParam(2, $idTour);
        $requete_prepare->execute();
    }

    public function supprimeEquipe($idJoueur)
    {
        $requete_prepare = Connexion::$bdd->prepare("DELETE FROM Equipe WHERE id_joueur=?");
        $requete_prepare->bindParam(1, $idJoueur);
        $requete_prepare->execute();
    }

    public function equipeActuelle($idJoueur)
    {
        $requete_prepare = Connexion::$bdd->prepare("SELECT * FROM Equipe INNER JOIN Tour USING(id_tour) WHERE id_joueur=?");
        $requete_prepare->bindParam(1, $idJoueur);
        $requete_prepare->execute();
        $resultat = $requete_prepare->fetchAll();
        return $resultat;
    }

    public function possedeTour($idJoueur, $idTour)
    {
        $requete_prepare = Connexion::$bdd->prepare("SELECT * FROM TourPossedee WHERE id_joueur=? AND id_tour=?");
        $requete_prepare->bindParam(1, $idJoueur);
        $requete_prepare->bindParam(2, $idTour);
        $requete_prepare->execute();
        $nbResultats = $requete_prepare->rowCount();
        if ($nbResultats > 0) {
            return true;
        }
        return false;
    }
}


?>