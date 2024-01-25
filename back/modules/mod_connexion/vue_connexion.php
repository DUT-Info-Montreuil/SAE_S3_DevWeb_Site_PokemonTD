<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once './back/vue_generique.php';

class VueConnexion extends VueGenerique
{

    public function __construct()
    {
        parent::__construct();
    }

    public function formInscription($token)
    {
        echo '
        <form method="post" action="index.php?module=mod_connexion&action=insertion_compte" >

        <label for"login">Login :</label>
        <input type="text" name="login" id="login" required><br><br>

        <label for"Password">Mot De Passe :</label>
        <input type="password" name="password" id="password" required> <br><br>

        <label for"Password">Confirmez Votre Mot De Passe :</label>
        <input type="password" name="password2" id="password2" required> <br><br>

        <input type="hidden" name="token" value="' . $token . '">

        <input type="submit" name="submit" value="S\'inscrire">

        </form>';
    }

    public function formConnexion($token)
    {
        echo '
        <form method="post" action="index.php?module=mod_connexion&action=connexion_compte" >

        <label for"login">Login :</label>
        <input type="text" name="login" id="login" required><br><br>

        <label for"Password">Mot De Passe :</label>
        <input type="password" name="password" id="password" required> <br><br>

        <input type="hidden" name="token" value="' . $token . '">

        <input type="submit" name="submit" value="Connexion">

        </form>';
    }

    public function displayError($error)
    {

        switch ($error) {
            case '1':
                echo 'Le Formulaire à expiré veuillez recharger la page';
                break;
            case '2':
                echo 'Probleme dans les données envoyées veuillez réessayer';
                break;
            case '3':
                echo 'Ce login est déjà utilisé, veuillez en choisir un nouveau';
                break;
            case '4':
                echo "Probleme de Token, veuillez réessayer";
                break;
            case '5':
                echo "Mot de Passe incorrect, réessayez";
                break;
            default:
                echo "Le systeme à rencontré un problème";
        }
    }
}


?>