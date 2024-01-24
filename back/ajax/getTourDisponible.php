<?php

//CONST BASE_URL = "security";
//const BASE_URL = "security";

//require_once('modele_equipe.php');
//require_once 'connexion.php';
require_once 'modele_ajax.php';

$modele = new Modele();
$donnees = $modele->toursPossedees(1);
//$donnees = $modele->testGetData();


header('Content-Type: application/json');
echo json_encode($donnees);
?>
