<?php
session_start();
require_once 'modele_ajax.php';
Connexion::initConnexion();


$modele = new Modele();

if(isset($_SESSION['id_joueur'])){
    $donnees = $modele->toursPossedees($_SESSION['id_joueur']);
    header('Content-Type: application/json');
    echo json_encode($donnees);
}
?>
