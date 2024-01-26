<?php

if (!defined("BASE_URL")) {
    die("il faut passer par l'index");
}

require_once './back/vue_generique.php';

class VueEquipe extends VueGenerique
{

    public function __construct()
    {
        parent::__construct();
    }

    public function afficheListe($tableauArray): void
    {
        foreach ($tableauArray as $array) {
            $nom = $array['nom'];
            $id = $array['id'];
            $link = "index.php?action=details&id={$id}&module=mod_equipes";
            echo "<p><a href={$link}>{$nom}</a></p>";
        }
        echo "<p><a href=index.php?module=mod_equipes>Retour</a></p>";
    }

    public function afficheTours($tableau): void
    {
        foreach ($tableau as $array) {
            $id = $array['id_tour'];
            $date = $array['date_acquisition'];
            echo "<p>{$id}, date : {$date}</p>";
        }
    }


    public function equipeActuelle($tableauEquipe): void
    {
        echo '<div class="boiteEquipe">';
        echo '<p class="boiteEquipe__titre">Équipe actuelle</p>';
        echo '<form method="post" action="index.php?module=mod_equipe&action=traitement_tour_equipe" class="boiteEquipe__form">';
        echo '<div class="boiteEquipe__form__container">';
        for ($i = 0; $i < 3; $i++) {
            if (isset($tableauEquipe[$i])) {
                $this->boitePokemonEquipe($tableauEquipe[$i]['nom'], $tableauEquipe[$i]['src_image'], $i, true, $tableauEquipe[$i]['id_tour']);
            } else {
                $this->boitePokemonEquipe("placeholder", "ressources/pokemon/placeholder.png", $i, false, "noPokemon");
            }
        }
        echo '</div>';
        echo '<input type="submit" value="Sauvegarder" class="boiteEquipe__submitButton"/>';
        echo '</form>';
        echo '</div>';
    }

    public function boitePokemonEquipe($nom, $lienImage, $idSlot, $isChecked, $idPokemon): void
    {
        echo "<div class='boiteEquipe__form__container__slot boiteEquipe__form__container__slot--{$idSlot}'>";
        echo "<img src='{$lienImage}' alt={$nom}>";
        if ($idPokemon == 'noPokemon') {
            echo "<p></p>";
            echo "<button class='boiteEquipe__form__container__slot__boutonSupprimer boiteEquipe__form__container__slot__boutonSupprimer--{$idSlot} equipe_bouton_cache'>Supprimer</button>";
        } else {
            echo "<p>{$nom}</p>";
            echo "<button class='boiteEquipe__form__container__slot__boutonSupprimer boiteEquipe__form__container__slot__boutonSupprimer--{$idSlot}'>Supprimer</button>";
        }
        if ($isChecked == true) {
            echo "<input type='checkbox' name=boiteEquipe__form__container__slot__input_{$idSlot} value={$idPokemon} checked hidden>";
        } else {
            echo "<input type='checkbox' name=boiteEquipe__form__container__slot__input_{$idSlot} value={$idPokemon} hidden>";
        }
        echo '</div>';
    }


    public function toursDisponibles($tableau, $tailleEquipe)
    {
        echo "<div class='boiteTour'>";
        echo '<div class="boiteTour__tri">';

        echo '<div data-tri-Type="alphabetiqueAsc" class="boiteTour__tri_bouton boiteTour__tri_bouton--selected boiteTour__tri_bouton--alphabetiqueAsc"><i class="fa-solid fa-arrow-up-z-a"></i></div>';
        echo '<div data-tri-Type="alphabetiqueDesc" class="boiteTour__tri_bouton boiteTour__tri_bouton--alphabetiqueDesc"><i class="fa-solid fa-arrow-down-z-a"></i></div>';
        echo '<div data-tri-Type="dateAsc" class="boiteTour__tri_bouton boiteTour__tri_bouton--dateAsc"><i class="fa-solid fa-arrow-up-9-1"></i></div>';
        echo '<div data-tri-Type="dateDesc" class="boiteTour__tri_bouton boiteTour__tri_bouton--dateDesc"><i class="fa-solid fa-arrow-down-9-1"></i></div>';
        echo '</div>';
        echo '<div class="boiteTour__contenu">';
        foreach ($tableau as $array) {
            $date_acquisition = new DateTime($array['date_acquisition']);
            $date = $date_acquisition->format('d/m/Y');

            echo '<div class="boiteTour__pokemon">';

            echo "<img src='{$array['src_image']}' alt={$array['nom']}>";
            echo "<p class='boiteTour__pokemon__nom' data-id-tour={$array['id_tour']}>{$array['nom']}</p>";
            echo "<p class='boiteTour__pokemon__date'>Obtention : {$date}</p>";
            if ($array['estDansEquipe'] == true) {
                echo "<button class='boiteTour__pokemon__ajoutBouton equipe_bouton_cache'>Ajout</button>";
                echo "<button class='boiteTour__pokemon__supprimerBouton'>Supprimer</button>";
            } else {
                if ($tailleEquipe == 3) {
                    echo "<button class='boiteTour__pokemon__ajoutBouton equipe_bouton_cache'>Ajout</button>";
                    echo "<button class='boiteTour__pokemon__supprimerBouton equipe_bouton_cache'>Supprimer</button>";
                } else {
                    echo "<button class='boiteTour__pokemon__ajoutBouton'>Ajout</button>";
                    echo "<button class='boiteTour__pokemon__supprimerBouton equipe_bouton_cache'>Supprimer</button>";
                }
            }

            echo '</div>';
        }
        echo '</div>';
        echo '</div>';

        echo "<script src='back/script/selectionEquipe.js'></script>";
        echo "<script src='back/script/triEquipe.js'></script>";
    }

    public function acceuilNonConnecte()
    {
        echo "<p class='message__equipe'>Vous devez être <a href='index.php?module=mod_connexion&action=lien_connexion'>connecté</a> pour pouvoir créer votre équipe!</p>";

        $sample = array(
            array(
                "nom" => "poussifeu",
                "src_image" => "ressources/pokemon/poussifeu.png"
            ),
            array(
                "nom" => "granivol",
                "src_image" => "ressources/pokemon/granivol.png"
            ),
            array(
                "nom" => "nidoran",
                "src_image" => "ressources/pokemon/nidoran.png"
            )
        );

        $this->equipeActuelleConfirmation($sample, "Exemple d'équipe");
    }

    private function equipeActuelleConfirmation($tableauEquipe, $titre)
    {
        echo '<div class="boiteEquipe">';
        echo "<p class='boiteEquipe__titre'>{$titre}</p>";
        echo '<div class="boiteEquipe__form">';
        echo '<div class="boiteEquipe__form__container">';
        for ($i = 0; $i < 3; $i++) {
            if (isset($tableauEquipe[$i])) {
                echo "<div class='boiteEquipe__form__container__slot'>";
                echo "<img src='{$tableauEquipe[$i]['src_image']}' alt={$tableauEquipe[$i]['nom']}>";
                echo "<p>{$tableauEquipe[$i]['nom']}</p>";
                echo '</div>';
            }
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    public function ajoutEquipeSucces($tab)
    {
        echo "<p class='message__equipe'>L'équipe a été ajouté avec succès! <a href='index.php?module=mod_equipe'>Retour</a></p>";
        $this->equipeActuelleConfirmation($tab, "Équipe Actuelle");
    }
}


?>