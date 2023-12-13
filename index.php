<?php
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
        Connexion::initConnexion();
        $a = new ModBoutique();
        $affichageModule = $a->afficheModule();
        break;
    default:
        require_once('./connexion.php');
        Connexion::initConnexion();
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