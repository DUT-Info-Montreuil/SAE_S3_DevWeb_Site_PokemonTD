<?php
require_once 'modele_ajax.php';
Connexion::initConnexion();

$modele = new Modele();
$donnees = $modele->toursPossedees(1);

header('Content-Type: application/json');
echo json_encode($donnees);
?>
