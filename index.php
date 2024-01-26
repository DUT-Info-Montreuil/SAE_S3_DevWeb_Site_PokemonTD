<?php
session_start();


//mettre un module par default ici
$module = isset($_GET['module']) ? $_GET['module'] : "defaut";
$_SESSION['estConnecter'] = isset($_SESSION['id_joueur']);

const BASE_URL = "security";

switch ($module) {
    case "mod_placeholder":
        //require le module ici
        Connexion::initConnexion();
        //inicier une variable de module ici
        break;
    case "mod_boutique":
        require_once('./back/modules/mod_boutique/mod_boutique.php');
        Connexion::initConnexion();
        $a = new ModBoutique();
        $affichageModule = $a->afficheModule();
        break;
    case "mod_connexion":
        require_once('./back/modules/mod_connexion/mod_connexion.php');
        Connexion::initConnexion();
        $a = new ModConnexion();
        $affichageModule = $a->afficheModule();
        break;
    case "mod_equipe":
        require_once('./back/modules/mod_equipe/mod_equipe.php');
        Connexion::initConnexion();
        $a = new ModEquipe();
        $affichageModule = $a->afficheModule();
        break;
    case "mod_trophees":
        require_once('./back/modules/mod_trophees/mod_trophees.php');
        Connexion::initConnexion();
        $a = new ModTrophees();
        $affichageModule = $a->afficheModule();
        break;
    case "mod_carte":
        require_once('./back/modules/mod_carte/mod_carte.php');
        Connexion::initConnexion();
        $a = new ModCarte();
        $affichageModule = $a->afficheModule();
        require_once "carte.php";
        break;
    default:
        ob_start();
        require_once('front/acceuil.html');
        $affichageModule = ob_get_clean();
        break;
}

if ($module != 'mod_carte')
    require_once "template.php";