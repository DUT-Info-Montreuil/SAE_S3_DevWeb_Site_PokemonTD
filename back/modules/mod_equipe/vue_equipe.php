<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once './back/vue_generique.php';

class VueEquipe extends VueGenerique {

    public function __construct() {
        parent::__construct();
    }

    public function afficheListe($tableauArray){
        foreach($tableauArray as $array){
            $nom = $array['nom'];
            $id = $array['id'];
            $link = "index.php?action=details&id={$id}&module=mod_equipes";
            echo "<p><a href={$link}>{$nom}</a></p>";
        }
        echo "<p><a href=index.php?module=mod_equipes>Retour</a></p>";
    }

    public function afficheTours($tableau){
        foreach($tableau as $array){
            $id = $array['id_tour'];
            $date = $array['date_acquisition'];
            echo "<p>{$id}, date : {$date}</p>";
        }
        //echo "<p><a href=index.php?module=mod_equipes>Retour</a></p>";
    }

    public function formulaireTour($tableau){
        echo '<form method="post" action="index.php?module=mod_equipe&action=traitement_tour_equipe">';
        foreach($tableau as $array){
            $id = $array['id_tour'];
            $date = $array['date_acquisition'];
            $estDansEquipe = $array['estDansEquipe'];
            echo "<label for=tour_{$id}>Tour n:{$id}, date : {$date}</label>";
            if($estDansEquipe){
                echo "<input type='checkbox' name=tour_{$id} value={$id} class=equipe_checkbox_tour checked>";
            }else{
                echo "<input type='checkbox' name=tour_{$id} value={$id} class=equipe_checkbox_tour>";
            }
            
        }
        echo '<input type="submit"/>';
        echo '</form>';
        echo "<script src='back/script/tour_possedees.js'></script>";
    }

}


?>