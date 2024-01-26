var boutonsAjout = document.querySelectorAll(".boiteTour__pokemon__ajoutBouton");
var boutonsSuppresion = document.querySelectorAll(".boiteTour__pokemon__supprimerBouton");
var boutonsSuppresionEquipe = document.querySelectorAll(".boiteEquipe__form__container__slot__boutonSupprimer");


boutonsAjout.forEach(function (bouton) {
    bouton.addEventListener('click', (e) => {
        e.preventDefault();
        var currentSlot = getAvailableSlot();
        if (canBeAdded(bouton.parentNode.querySelector(".boiteTour__pokemon__nom").dataset.idTour)) {

            var nomSelectionne = bouton.parentNode.querySelector(".boiteTour__pokemon__nom").textContent;
            var imageSelectionne = bouton.parentNode.querySelector("img").getAttribute("src");
            var idTourSelectionne = bouton.parentNode.querySelector(".boiteTour__pokemon__nom").dataset.idTour;
            currentSlot.querySelector("p").textContent = nomSelectionne;
            currentSlot.querySelector("img").setAttribute("src", imageSelectionne);
            currentSlot.querySelector("img").setAttribute("alt", nomSelectionne);

            currentSlot.querySelector("input").value = idTourSelectionne;
            currentSlot.querySelector("input").checked = true;

            currentSlot.querySelector("button").classList.remove("equipe_bouton_cache");
            currentSlot.querySelector("button").classList.add("equipe_bouton_visible");

            cacherBoutonAjout(bouton.parentNode);

            if (nombreDePlaceDisponible() == 0) {
                cacherTousBoutonsAjouts();
            }
        }
    });
});

//Suppression B
boutonsSuppresion.forEach(function (bouton) {
    bouton.addEventListener('click', (e) => {

        e.preventDefault();
        var idTour = bouton.parentNode.querySelector("p").dataset.idTour;

        var currentSlot = getCorrespondingSlot(idTour);

        currentSlot.querySelector("p").textContent = "";
        currentSlot.querySelector("img").setAttribute("src", "ressources/pokemon/placeholder.png");
        currentSlot.querySelector("img").setAttribute("alt", "placeholder");
        currentSlot.querySelector("input").checked = false;
        currentSlot.querySelector("input").value = "noPokemon";

        currentSlot.querySelector("button").classList.add("equipe_bouton_cache");
        currentSlot.querySelector("button").classList.remove("equipe_bouton_visible");

        cacherBoutonSupprimer(bouton.parentNode);
        if (nombreDePlaceDisponible() == 1) {
            afficheBoutonsAjoutsEligible();
        }
    });
});

//Supression A (en haut)
boutonsSuppresionEquipe.forEach(function (bouton) {
    bouton.addEventListener('click', (e) => {
        e.preventDefault();

        var tour = getCorrespondingTour(bouton.parentNode.querySelector("input").value);

        bouton.parentNode.querySelector("p").textContent = "";
        bouton.parentNode.querySelector("img").setAttribute("src", "ressources/pokemon/placeholder.png");
        bouton.parentNode.querySelector("img").setAttribute("alt", "placeholder");
        bouton.parentNode.querySelector("input").checked = false;
        bouton.parentNode.querySelector("input").value = "noPokemon";

        bouton.classList.add("equipe_bouton_cache");
        bouton.classList.remove("equipe_bouton_visible");

        cacherBoutonSupprimer(tour);

        if (nombreDePlaceDisponible() == 1) {
            afficheBoutonsAjoutsEligible();
        }
    });
});

function getAvailableSlot() {
    var allSlots = document.querySelectorAll(".boiteEquipe__form__container__slot");
    for (var slot of allSlots) {
        if (!slot.querySelector("input").checked) {
            return slot;
        }
    }
}

function getCorrespondingTour($id) {
    var allTours = document.querySelectorAll(".boiteTour__pokemon");
    for (var tour of allTours) {
        if (tour.querySelector(".boiteTour__pokemon__nom").dataset.idTour == $id) {
            return tour;
        }
    }
}

function getCorrespondingSlot($id) {
    var allSlots = document.querySelectorAll(".boiteEquipe__form__container__slot");
    for (var slot of allSlots) {
        if (slot.querySelector("input").value == $id) {
            return slot;
        }
    }
}

function canBeAdded($id) {
    var allSlots = document.querySelectorAll(".boiteEquipe__form__container__slot");
    for (var slot of allSlots) {
        if (slot.querySelector("input").value == $id) {
            return false;
        }
    }
    return true;
}

function nombreDePlaceDisponible() {
    var allSlots = document.querySelectorAll(".boiteEquipe__form__container__slot");
    nb = 0;
    for (var slot of allSlots) {

        if (slot.querySelector("input").value == "noPokemon") {
            nb = nb + 1;
        }
    }
    return nb;
}

function cacherTousBoutonsAjouts() {
    var allButtons = document.querySelectorAll(".boiteTour__pokemon__ajoutBouton");
    for (var button of allButtons) {
        if (!button.classList.contains("equipe_bouton_cache")) {
            button.classList.remove("equipe_bouton_visible");
            button.classList.add("equipe_bouton_cache");
        }
    }
}

function afficheBoutonsAjoutsEligible() {
    var allButtons = document.querySelectorAll(".boiteTour__pokemon__ajoutBouton");
    for (var button of allButtons) {
        idTour = button.parentNode.querySelector(".boiteTour__pokemon__nom").dataset.idTour;
        if (canBeAdded(idTour)) {
            button.classList.add("equipe_bouton_visible");
            button.classList.remove("equipe_bouton_cache");
        }
    }
}

function cacherBoutonSupprimer(div) {
    var btnSupprimer = div.querySelector(".boiteTour__pokemon__supprimerBouton");
    var btnAjout = div.querySelector(".boiteTour__pokemon__ajoutBouton");

    btnSupprimer.classList.add("equipe_bouton_cache");
    btnSupprimer.classList.remove("equipe_bouton_visible");
    btnAjout.classList.remove("equipe_bouton_cache");
    btnAjout.classList.add("equipe_bouton_visible");
}

function cacherBoutonAjout(div) {
    var btnSupprimer = div.querySelector(".boiteTour__pokemon__supprimerBouton");
    var btnAjout = div.querySelector(".boiteTour__pokemon__ajoutBouton");

    btnAjout.classList.add("equipe_bouton_cache");
    btnAjout.classList.remove("equipe_bouton_visible");
    btnSupprimer.classList.remove("equipe_bouton_cache");
    btnSupprimer.classList.add("equipe_bouton_visible");
}
