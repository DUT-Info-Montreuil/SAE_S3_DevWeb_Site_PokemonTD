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

            //WIP 2/3 Ca a l'air de marcher
            //console.log(currentSlot.querySelector("button"));
            currentSlot.querySelector("button").classList.remove("equipe_bouton_cache");
            currentSlot.querySelector("button").classList.add("equipe_bouton_visible");

            // currentSlot.querySelector("p").classList.remove("equipe_bouton_cache");
            // currentSlot.querySelector("p").classList.add("equipe_bouton_visible");


            cacherBoutonAjout(bouton.parentNode);
            //miseAJourPlace();
            //nombreDePlaceDisponible();

            //A remettre
            if(nombreDePlaceDisponible() == 0){
                console.log("YA PAS DE PLACEEEEEEEEEEEEEEEUH");
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

        //WIP 1/3 Ca a l'air de marcher
        currentSlot.querySelector("button").classList.add("equipe_bouton_cache");
        currentSlot.querySelector("button").classList.remove("equipe_bouton_visible");
        //console.log(currentSlot.querySelector("button"));



        //currentSlot.querySelector("button").classList.add("equipe_bouton_cache");
        //currentSlot.querySelector("button").classList.remove("equipe_bouton_visible");

        // currentSlot.querySelector("p").classList.add("equipe_bouton_cache");
        // currentSlot.querySelector("p").classList.remove("equipe_bouton_visible");


        cacherBoutonSupprimer(bouton.parentNode);
        //miseAJourPlace();
        if(nombreDePlaceDisponible() == 1){
            console.log("On doit reafficher");
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

        //bouton.parentNode.querySelector("button").classList.remove("equipe_bouton_cache");
        //bouton.parentNode.querySelector("button").classList.add("equipe_bouton_visible");

        //console.log(bouton);
        bouton.classList.add("equipe_bouton_cache");
        bouton.classList.remove("equipe_bouton_visible");

        //console.log(bouton);
        //console.log(bouton.parentNode);

        cacherBoutonSupprimer(tour);
        //miseAJourPlace();
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
    //console.log(allSlots);
    nb = 0;
    for (var slot of allSlots) {
        
        if (slot.querySelector("input").value == "noPokemon") {
            //console.log(slot.querySelector("input"));
            nb = nb + 1;
        }
    }
    //console.log(nb);
    return nb;
}

function cacherTousBoutonsAjouts(){
    var allButtons = document.querySelectorAll(".boiteTour__pokemon__ajoutBouton");
    for (var button of allButtons) {
        //console.log(button);
        if (!button.classList.contains("equipe_bouton_cache")) {
            console.log(button);
            button.classList.remove("equipe_bouton_visible");
            button.classList.add("equipe_bouton_cache");
        }
    }
}

function afficheBoutonsAjoutsEligible(){
    var allButtons = document.querySelectorAll(".boiteTour__pokemon__ajoutBouton");
    for (var button of allButtons) {
        //console.log(button.parentNode);
        //console.log(button.parentNode.querySelector(".boiteTour__pokemon__nom").dataset.idTour)
        idTour = button.parentNode.querySelector(".boiteTour__pokemon__nom").dataset.idTour;
        if(canBeAdded(idTour)){
            //console.log(button);
            button.classList.add("equipe_bouton_visible");
            button.classList.remove("equipe_bouton_cache");
        }
        //console.log(idTour);
        
        //if()
        /*
        if (!button.classList.contains("equipe_bouton_cache")) {
            console.log(button);
            button.classList.remove("equipe_bouton_visible");
            button.classList.add("equipe_bouton_cache");
        }*/
    }
}

function miseAJourPlace(){
    if(nombreDePlaceDisponible() == 0){
        console.log("hello?");
        var div = document.querySelectorAll(".boiteTour__pokemon");
        for(d in div){
            cacherBoutonAjout(d);
        }
    }/*else if(nombreDePlaceDisponible() == 2){
        var div = document.querySelectorAll(".boiteTour__pokemon");
        for(d in div){
            if(canBeAdded(d.querySelector("p").dataset.idTour)){
                //cacherBoutonSupprimer(d);
            }
            //cacherBoutonAjout(d);
        }
    }*/
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
