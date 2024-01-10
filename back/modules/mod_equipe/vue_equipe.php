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
            //echo "<p>{$id}, date : {$date}</p>";
            echo "<label for=tour_{$id}>Tour n:{$id}, date : {$date}</label>";
            echo "<input type='checkbox' id=tour_{$id} name=tour_{$id} class=equipe_checkbox_tour>";

        }
        echo '<input type="submit"/>';
        echo '</form>';
        /*
        echo "<script>
        const el = document.querySelector('#tour_1');
    el.addEventListener('click',() =>{
        console.log('Tu as cliqué')
    });
        </script>";
        */
        echo "<script src='back/script/tour_possedees.js'></script>";

    }

    /*
    <form action="#" method="post">
    <label for="element1">Élément 1</label>
    <input type="checkbox" id="element1" name="element1">

    <br>

    <label for="element2">Élément 2</label>
    <input type="checkbox" id="element2" name="element2">

    <br>

    <label for="element3">Élément 3</label>
    <input type="checkbox" id="element3" name="element3">

    <br>

    <!-- Ajoute d'autres éléments de formulaire ici -->

    <br>

    <input type="submit" value="Soumettre">
</form>     */

}


?>