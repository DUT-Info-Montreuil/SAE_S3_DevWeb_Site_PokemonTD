<?php
session_start();

//mettre un module par defaut ici

const BASE_URL = "hello_word";

switch($module) {
    case "mod_placeholder":
        //require le module ici
        Connexion::initConnexion();
        //inicier une variable de module ici
        break;
    default:
        die("Module inconnu");
}
//fin du tampon
// $affichageModule = $a->afficheModule();

//creation des composants
// include_once 'back/composants/menu/comp_menu.php';
// $menu = new CompMenu($module);

require_once "template.php";
?>