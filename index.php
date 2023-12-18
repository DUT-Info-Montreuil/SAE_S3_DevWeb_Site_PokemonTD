<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

//mettre un module par defaut ici
$module = isset($_GET['module']) ? $_GET['module'] : "defaut";

const BASE_URL = "securité";

switch($module) {
    case "mod_placeholder":
        //require le module ici
        Connexion::initConnexion();
        //inicier une variable de module ici
        break;
    case "mod_boutique":
        require_once('./back/modules/mod_boutique/mod_boutique.php');
        require_once('./back/modules/Connexion.php');
        Connexion::initConnexion();
        $a = new ModBoutique();
        $affichageModule = $a->afficheModule();
        break;
    case "mod_equipe":
        require_once('./back/modules/mod_equipe/mod_equipe.php');
        require_once('./back/modules/Connexion.php');
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
?>