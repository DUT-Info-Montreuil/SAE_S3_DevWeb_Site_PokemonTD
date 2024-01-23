var inputSlotEquipe1 = document.querySelector("#boiteEquipe__form__input_1");
var boutons = document.querySelectorAll(".boiteTour__pokemon__ajoutBouton");
//console.log(boutons);

/*
var bouton_1 = document.querySelector("#boiteTour__pokemon__ajoutBouton_1");
console.log(bouton_1);

boutons.forEach(function(bouton) {
    bouton.addEventListener('click', () => {
        console.log(bouton.textContent);
        inputSlotEquipe1.value = bouton.textContent;
    });
});
*/

var div_slot_1 = document.querySelector(".boiteEquipe__form__container__slot--1");
console.log(div_slot_1);

boutons.forEach(function(bouton) {
    bouton.addEventListener('click', (e) => {

        e.preventDefault();
        //e.prevanat
        var name = div_slot_1.querySelector("p");
        console.log(name);
        name.textContent = "machin";

        //console.log(bouton.textContent);
        //inputSlotEquipe1.value = bouton.textContent;
    });
});