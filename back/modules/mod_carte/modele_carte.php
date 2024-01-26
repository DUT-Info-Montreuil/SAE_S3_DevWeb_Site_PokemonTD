<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once './connexion.php';

class ModeleCarte extends Connexion
{

    public function __construct()
    {

    }

    public function recupNiveauJoue($id_joueur)
    {
        try {
            $query = "
            SELECT DISTINCT nom,C.id_carte
            FROM dutinfopw201618.Historique H
            INNER JOIN dutinfopw201618.NiveauJouable NJ ON H.id_niveau = NJ.id_niveau
            INNER JOIN dutinfopw201618.Carte C ON C.id_carte = NJ.id_carte 
            WHERE id_joueur = $id_joueur
            ";
            $stmt = Connexion::$bdd->prepare($query);
            return $this->executeQuery($stmt);
        } catch (PDOException $e) {
            echo $e;
            return -1;
        }
    }

    private function executeQuery($stmt)
    {

        $stmt->execute();

        // Récupérez les résultats sous forme d'un tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function recupHistorique($idCarte, $idJoueur)
    {
        try {
            $query = "
            SELECT H.a_gagne,H.date_jeu,N.gain,N.difficulte_etoile
            FROM dutinfopw201618.Historique H
            INNER JOIN dutinfopw201618.NiveauJouable N ON H.id_niveau = N.id_niveau
            INNER JOIN dutinfopw201618.Carte C on N.id_carte = C.id_carte
            WHERE C.id_carte = $idCarte and H.id_joueur = $idJoueur
            ";
            $stmt = Connexion::$bdd->prepare($query);
            return $this->executeQuery($stmt);
        } catch (PDOException $e) {
            echo $e;
            return -1;
        }
    }

    public function recupInfoCarte($idCarte)
    {
        try {
            $query = "
            SELECT C.nom,C.src_image
            FROM dutinfopw201618.Carte C 
            WHERE C.id_carte = $idCarte
            ";
            $stmt = Connexion::$bdd->prepare($query);
            return $this->executeQuery($stmt)[0];
        } catch (PDOException $e) {
            echo $e;
            return -1;
        }
    }
}