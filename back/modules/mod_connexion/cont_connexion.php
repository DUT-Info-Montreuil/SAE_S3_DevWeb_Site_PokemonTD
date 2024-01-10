<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once "modele_connexion.php" ;
require_once "vue_connexion.php" ;

class ContConnexion {

    private $vue;
    private $modele;
    
    public function __construct(){
        $this->vue = new VueConnexion();
        $this->modele = new ModeleConnexion();
    }



    public function lienInscription(){
        $tok= $this->modele->genereToken(20);
        $this->vue->formInscription($tok);
    }

    public function insertionCompte(){
        
        if(isset($_POST['token'], $_SESSION['token']) && $_POST['token'] == $_SESSION['token']) {
            // Le token est valide, traitement du formulaire
            if(time()-$_SESSION['tokenCreation']<180){
                if( $_POST['password2']==$_POST['password']&& $_POST['submit']){
                                if ($this->modele->ajoutUser()==-1) {
                                    $this->vue->displayError(3);
                                }

                }else{
                    $this->vue->displayError(2); //erreur dans les données du formulaire d'inscription
                }
                // Supprimer le token après utilisation pour qu'il ne puisse pas être réutilisé
                unset($_SESSION['token']);
            }else
            $this->vue->displayError(1);     // token expiré
            
        } else {
            $this->vue->displayError(4); // token non correspondant
        }

        echo "<meta http-equiv='refresh' content= '2;url=index.php'> <p>Vous allez être redirigé</p>";

    
    }


    public function lienConnexion(){
        $tok= $this->modele->genereToken(20);
        $this->vue->formConnexion($tok);
    }

    public function connexionCompte(){
        
        if(isset($_POST['token'], $_SESSION['token']) && $_POST['token'] == $_SESSION['token']) {
            // Le token est valide, traitement du formulaire
            if(time()-$_SESSION['tokenCreation']<180){
                if( isset($_POST['password'], $_POST['submit'])){
                    if ($this->modele->connexionUser()==-1) {
                        $this->vue->displayError(5);  //
                    }

                }else{
                    $this->vue->displayError(2); //erreur dans les données du formulaire d'inscription
                }
                // Supprimer le token après utilisation pour qu'il ne puisse pas être réutilisé
                unset($_SESSION['token']);
            }else
            $this->vue->displayError(1);     // token expiré
            
        } else {
            $this->vue->displayError(4); // token non correspondant
        }

//        echo "<meta http-equiv='refresh' content= '2;url=index.php'> <p>Vous allez être redirigé</p>";

    
    }
    public function affichage() {
        return $this->vue->getAffichage();
    }

}
?>