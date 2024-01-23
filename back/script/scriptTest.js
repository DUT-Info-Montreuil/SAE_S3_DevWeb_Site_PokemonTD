var boutonsAjout = document.querySelectorAll(".boiteTour__pokemon__ajoutBouton");
var boutonsSuppresion = document.querySelectorAll(".boiteTour__pokemon__supprimerBouton");
var boutonsSuppresionEquipe = document.querySelectorAll(".boiteEquipe__form__container__slot__boutonSupprimer");


boutonsAjout.forEach(function (bouton) {
    bouton.addEventListener('click', (e) => {
        e.preventDefault();
        var currentSlot = getAvailableSlot();
        if (canBeAdded(bouton.parentNode.querySelector("p").dataset.idTour)) {

            var nomSelectionne = bouton.parentNode.querySelector("p").textContent;
            var imageSelectionne = bouton.parentNode.querySelector("img").getAttribute("src");
            var idTourSelectionne = bouton.parentNode.querySelector("p").dataset.idTour;
            currentSlot.querySelector("p").textContent = nomSelectionne;
            currentSlot.querySelector("img").setAttribute("src", imageSelectionne);
            currentSlot.querySelector("img").setAttribute("alt", nomSelectionne);


            currentSlot.querySelector("input").value = idTourSelectionne;
            currentSlot.querySelector("input").checked = true;
        }
    });
});


boutonsSuppresion.forEach(function (bouton) {
    bouton.addEventListener('click', (e) => {

        e.preventDefault();
        console.log("Suppression");

        //console.log(getAvailableSlot());
        var idTour = bouton.parentNode.querySelector("p").dataset.idTour;

        var currentSlot = getCorrespondingSlot(idTour);
        console.log(currentSlot);

        currentSlot.querySelector("p").textContent = "placeholder";
        currentSlot.querySelector("img").setAttribute("src", "placeholder");
        currentSlot.querySelector("img").setAttribute("alt", "placeholder");
        currentSlot.querySelector("input").checked = false;
        currentSlot.querySelector("input").value = "noPokemon";
    });
});

boutonsSuppresionEquipe.forEach(function (bouton) {
    bouton.addEventListener('click', (e) => {
        e.preventDefault();

        console.log("Suppression Equipe");

        bouton.parentNode.querySelector("p").textContent = "placeholder";
        bouton.parentNode.querySelector("img").setAttribute("src", "placeholder");
        bouton.parentNode.querySelector("img").setAttribute("alt", "placeholder");
        bouton.parentNode.querySelector("input").checked = false;
        bouton.parentNode.querySelector("input").value = "noPokemon";
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

