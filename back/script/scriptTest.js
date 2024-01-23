var boutonsAjout = document.querySelectorAll(".boiteTour__pokemon__ajoutBouton");
var boutonsSuppresion = document.querySelectorAll(".boiteTour__pokemon__supprimerBouton");
var boutonsSuppresionEquipe = document.querySelectorAll(".boiteEquipe__form__container__slot__boutonSupprimer");


boutonsAjout.forEach(function(bouton) {
    bouton.addEventListener('click', (e) => {

        e.preventDefault();
        var currentSlot = getAvailableSlot();

        var nomSelectionne = bouton.parentNode.querySelector("p").textContent;
        var imageSelectionne = bouton.parentNode.querySelector("img").getAttribute("src");
        var idTourSelectionne = bouton.parentNode.querySelector("p").dataset.idTour;
        currentSlot.querySelector("p").textContent = nomSelectionne;
        currentSlot.querySelector("img").setAttribute("src", imageSelectionne);
        currentSlot.querySelector("img").setAttribute("alt", nomSelectionne);

    
        currentSlot.querySelector("input").value = idTourSelectionne;
        currentSlot.querySelector("input").checked = true;
    });
});


boutonsSuppresion.forEach(function(bouton) {
    bouton.addEventListener('click', (e) => {

        e.preventDefault();
        console.log("Suppression");

        console.log(getAvailableSlot());

        var currentSlot = getAvailableSlot();

        currentSlot.querySelector("p").textContent = "placeholder";
        currentSlot.querySelector("img").setAttribute("src", "placeholder");
        currentSlot.querySelector("img").setAttribute("alt", "placeholder");
        currentSlot.querySelector("input").checked = false;
    });
});

boutonsSuppresionEquipe.forEach(function(bouton) {
    bouton.addEventListener('click', (e) => {
        e.preventDefault();

        console.log("Suppression Equipe");

        bouton.parentNode.querySelector("p").textContent = "placeholder";
        bouton.parentNode.querySelector("img").setAttribute("src", "placeholder");
        bouton.parentNode.querySelector("img").setAttribute("alt", "placeholder");
        bouton.parentNode.querySelector("input").checked = false;        
    });
});

function getAvailableSlot(){
    var allSlots = document.querySelectorAll(".boiteEquipe__form__container__slot");
    for (var slot of allSlots) {
        if(!slot.querySelector("input").checked){
            return slot;
        }
    }
}

