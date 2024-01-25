<?php

require_once 'connexion_ajax.php';

class Modele extends Connexion
{

    public function __construct()
    {
    }

    public function toursPossedees($idJoueur)
    {
        $requete_prepare = Connexion::$bdd->prepare("SELECT * FROM TourPossedee INNER JOIN Tour USING(id_tour) WHERE id_joueur=?");
        $requete_prepare->bindParam(1, $idJoueur);
        $requete_prepare->execute();
        $resultat = $requete_prepare->fetchAll();
        return $resultat;
    }
}


?>