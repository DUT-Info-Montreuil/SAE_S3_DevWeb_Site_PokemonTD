$(document).ready(function () {
    $(".boiteTour__triButton").click(function () {
        //console.log("CA MARCHE");

        $.ajax({
            url: 'back/ajax/getTourDisponible.php',
            type: 'GET',
            dataType: 'json',
            success: function (response) {

                var response = response.sort(function (a, b) {
                    var nameA = a.nom.toUpperCase();
                    var nameB = b.nom.toUpperCase();
                    return (nameA < nameB) ? - 1 : (nameA > nameB) ? 1 : 0;
                });
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