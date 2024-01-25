<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once "modele_trophees.php" ;
require_once "vue_trophees.php" ;

class ContTrophees {

    private $vue;
    private $modele;
    
    public function __construct(){
        $this->vue = new VueTrophees();
        $this->modele = new ModeleTrophees();
    }

    public function erreur404(){
        $this->vue->afficheErreur(404);
    }

    public function afficheTrophees($poss){
        if (!$_SESSION['estConnecter']){$poss=0;}
       $troph =$this->modele->recupereTrophees($poss);

        if($troph !=-1){    
            $this->vue->afficheTrophees($troph,$poss);
        }else {
            $this->vue->afficheErreur(1);
        }
    }


    public function formAjoutTrophee(){
        $tok= $this->modele->genereToken(20);
        $this->vue->formAjoutTrophee($tok);
    }

    public function ajouterTrophee(){
        if ($_SESSION['estConnecter'] && $_SESSION['moderateur']==1){
            if (isset($_POST['name']) && isset($_POST['conditionObt'])&& isset($_FILES['logo']['tmp_name']) && isset($_POST['token']) && $_POST['token']==$_SESSION['token'] && $_POST['name'] != "" && $_POST['conditionObt'] != ""){

                if (time()- $_SESSION['tokenCreation']  <= 180) {
                    $result = $this->modele->ajoutTrophee($_POST['name'],$_POST['conditionObt']);
                
                    if ($result){
                        echo 'la competition ' . $_POST['name'] . ' a bien été ajouté !<br>';
                        echo "allez dans l'onglet 'gerer comp' pour ajouter des nouveau matchs";
                        echo '<meta http-equiv="refresh" content="2;url=admin.php"/>';
                    }else{
                        $this->vue->afficheErreur(3); // erreur de bd, contacter l'admin
                    }
                }else{
                    $this->vue->afficheErreur(5); // pb de token
                }
            }else{
                $this->vue->afficheErreur(2); // remplir les champs
            }
        }
    }


    public function affichage() {
        return $this->vue->getAffichage();
    }

}
