<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

//mettre un module par default ici
$module = isset($_GET['module']) ? $_GET['module'] : "defaut";
$_SESSION['id_joueur'] = isset($_SESSION['id_joueur']) ? $_SESSION['id_joueur'] : "1";

const BASE_URL = "security";

switch($module) {
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
    default:
        ob_start();
        require_once('front/acceuil.html');
        $affichageModule = ob_get_clean();
        break;
}

// creation des composants
// include_once 'back/composants/menu/comp_menu.php';
// $menu = new CompMenu($module);

require_once "template.php";