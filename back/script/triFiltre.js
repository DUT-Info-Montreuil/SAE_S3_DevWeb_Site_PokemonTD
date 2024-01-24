$(document).ready(function () {
    $(".boiteTour__triButton").click(function (event) {
        //console.log(event);
        console.log(event.currentTarget.dataset.triType);
        //console.log("CA MARCHE");
        var typeDeTri = event.currentTarget.dataset.triType;

        $.ajax({
            url: 'back/ajax/getTourDisponible.php',
            type: 'GET',
            dataType: 'json',
            success: function (response) {

                /*
                var response = response.sort(function (a, b) {
                    var nameA = a.nom.toUpperCase();
                    var nameB = b.nom.toUpperCase();
                    return (nameA < nameB) ? - 1 : (nameA > nameB) ? 1 : 0;
                });
                */
                switch(typeDeTri){
                    case "alphabetiqueAsc":
                        response = triAlphabetiqueAsc(response);
                        break;
                    case "alphabetiqueDesc":
                        response = triAlphabetiqueDesc(response);
                        break;
                    default:
                        response = triAlphabetiqueDesc(response);
                        break;
                }
                //console.log(response);
                var boiteTourPokemon = document.querySelectorAll(".boiteTour__pokemon");
                //console.log(boiteTourPokemon);
                for (var i = 0; i < response.length; i++) {
                    var json = response[i];
                    var div = boiteTourPokemon[i];

                    div.querySelector("p").dataset.idTour = json.id_tour;
                    div.querySelector("p").textContent = json.nom;
                    div.querySelector("img").setAttribute("src", json.src_image);
                    div.querySelector("img").setAttribute("alt", json.nom);
                };
            },
            error: function (error) {
                console.log('Il y a une erreur', error);
            }
        });

    });
});

/*
boiteTour__tri_bouton--alphabetiqueAsc"><i class="fa-solid fa-arrow-up-z-a"></i></div>';
        echo '<div class="boiteTour__tri_bouton boiteTour__tri_bouton--alphabetiqueDesc"><i class="fa-solid fa-arrow-down-z-a"></i></div>';
        echo '<div class="boiteTour__tri_bouton boiteTour__tri_bouton--dateAsc"><i class="fa-solid fa-arrow-up-9-1"></i></div>';
        echo '<div class="boiteTour__tri_bouton boiteTour__tri_bouton--dateDesc"
 */
function triAlphabetiqueAsc(donnees) {
    donnees = donnees.sort(function (a, b) {
        var nameA = a.nom.toUpperCase();
        var nameB = b.nom.toUpperCase();
        return (nameA < nameB) ? - 1 : (nameA > nameB) ? 1 : 0;
    });
    return donnees;
}
function triAlphabetiqueDesc(donnees) {
    donnees = donnees.sort(function (a, b) {
        var nameA = a.nom.toUpperCase();
        var nameB = b.nom.toUpperCase();
        return (nameA > nameB) ? -1 : (nameA < nameB) ? 1 : 0;
    });
    return donnees;
}
function triDateAsc($donnees) {
    return $donnees;
}
function triDateDesc($donnees) {
    return $donnees;
}