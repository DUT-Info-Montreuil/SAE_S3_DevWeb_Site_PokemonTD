<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once './back/vue_generique.php';

class VueConnexion extends VueGenerique {

    public function __construct() {
        parent::__construct();
    }

    public function formInscription($token){
        echo'
        <form action="index.php?module=mod_connexion&action=insertion" method="post">

        <label for"login">Login :</label>
        <input type="text" name"login" id="login" required><br><br>

        <label for"Password">Mot De Passe :</label>
        <input type="password" name"password" id="password" required></textarea> <br><br>

        <label for"Password">Verifiez Votre Mot De Passe :</label>
        <input type="password" name"password2" id="password2" required></textarea> <br><br>

        <input type="hidden" name="token" value="'.$token.'">

        <input type="submit" value="S\'inscrire">

        </form>';
    }

}


?>