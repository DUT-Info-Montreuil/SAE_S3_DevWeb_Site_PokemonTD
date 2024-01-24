var boutonsTri = document.querySelectorAll(".boiteTour__triButton");

$(document).ready(function () {
    $(".boiteTour__tri_bouton").click(function (event) {
        var typeDeTri = event.currentTarget.dataset.triType;

        //boiteTour__tri_bouton boiteTour__tri_bouton--alphabetiqueAsc
        resetTriCss();
        event.currentTarget.classList.add("boiteTour__tri_bouton--selected");
        
        $.ajax({
            url: 'back/ajax/getTourDisponible.php',
            type: 'GET',
            dataType: 'json',
            success: function (reponse) {
                switch (typeDeTri) {
                    case "alphabetiqueAsc":
                        reponse = triAlphabetiqueAsc(reponse);
                        break;
                    case "alphabetiqueDesc":
                        reponse = triAlphabetiqueDesc(reponse);
                        break;
                    case "dateAsc":
                        reponse = triDateAsc(reponse);
                        break;
                    case "dateDesc":
                        reponse = triDateDesc(reponse);
                        break;
                    default:
                        reponse = triAlphabetiqueDesc(reponse);
                        break;
                }
                var boiteTourPokemon = document.querySelectorAll(".boiteTour__pokemon");

                for (var i = 0; i < reponse.length; i++) {
                    var json = reponse[i];
                    var div = boiteTourPokemon[i];

                    div.querySelector(".boiteTour__pokemon__nom").dataset.idTour = json.id_tour;
                    div.querySelector(".boiteTour__pokemon__nom").textContent = json.nom;
                    div.querySelector(".boiteTour__pokemon__date").textContent = json.date_acquisition;
                    div.querySelector("img").setAttribute("src", json.src_image);
                    div.querySelector("img").setAttribute("alt", json.nom);

                    var btnSupprimer = div.querySelector(".boiteTour__pokemon__supprimerBouton");
                    var btnAjout = div.querySelector(".boiteTour__pokemon__ajoutBouton");

                    if (estDansSlot(json.id_tour)) {
                        btnAjout.classList.add("equipe_bouton_cache");
                        btnAjout.classList.remove("equipe_bouton_visible");
                        btnSupprimer.classList.remove("equipe_bouton_cache");
                        btnSupprimer.classList.add("equipe_bouton_visible");
                    } else {
                        btnSupprimer.classList.add("equipe_bouton_cache");
                        btnSupprimer.classList.remove("equipe_bouton_visible");
                        btnAjout.classList.remove("equipe_bouton_cache");
                        btnAjout.classList.add("equipe_bouton_visible");
                    }

                };
            },
            error: function (error) {
                console.log('Il y a une erreur', error);
            }
        });

    });
});

function estDansSlot($id) {
    var allSlots = document.querySelectorAll(".boiteEquipe__form__container__slot");
    for (var slot of allSlots) {
        if (slot.querySelector("input").value == $id) {
            return true;
        }
    }
    return false;
}

function triAlphabetiqueAsc(donnees) {
    donnees = donnees.sort(function (a, b) {
        var nomA = a.nom.toUpperCase();
        var nomB = b.nom.toUpperCase();
        return (nomA < nomB) ? - 1 : (nomA > nomB) ? 1 : 0;
    });
    return donnees;
}
function triAlphabetiqueDesc(donnees) {
    donnees = donnees.sort(function (a, b) {
        var nomA = a.nom.toUpperCase();
        var nomB = b.nom.toUpperCase();
        return (nomA > nomB) ? -1 : (nomA < nomB) ? 1 : 0;
    });
    return donnees;
}
function triDateAsc(donnees) {
    donnees = donnees.sort(function (a, b) {
        var dateA = new Date(a.date_acquisition);
        var dateB = new Date(b.date_acquisition);
        return dateA - dateB;
    });
    return donnees;
}
function triDateDesc(donnees) {
    donnees = donnees.sort(function (a, b) {
        var dateA = new Date(a.date_acquisition);
        var dateB = new Date(b.date_acquisition);
        return dateB - dateA;
    });
    return donnees;
}

function resetTriCss() {
    var allButtons = document.querySelectorAll(".boiteTour__tri_bouton");
    for (var button of allButtons) {
        button.classList.remove("boiteTour__tri_bouton--selected");
    }
}