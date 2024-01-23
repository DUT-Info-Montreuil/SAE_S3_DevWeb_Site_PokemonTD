
/*
const el = document.querySelector('#tour_2');
el.addEventListener('click', () => {
    console.log('Tu as cliqué')
});
*/
//var checkboxes = document.querySelectorAll('.equipe_checkbox_tour');
//var m = equipe_checkbox_tour
/*
const el = document.querySelector('#tour_2');
el.addEventListener('click', () => {
    //console.log('Tu as cliqué')
    var checkboxes = document.querySelectorAll('.equipe_checkbox_tour:checked');
    console.log(checkboxes.length);
});
*/
/*
var inputField = document.getElementById("inputField");
var transferButton = document.getElementById("transferButton");

// Add click event listener to the button
transferButton.addEventListener("click", function() {
  // Get the value from the input in the second div
  var inputValue = document.getElementById("secondDiv").textContent;

  // Update the value of the input in the first div
  inputField.value = inputValue;
});
*/

//var inputSlotEquipe1 = document.getElementById("boiteEquipe__form__input_1");
var inputSlotEquipe1 = document.querySelector("#boiteEquipe__form__input_1");
//inputSlotEquipe1.value = "HDHPISAJOIJSAPJPIDWJLIDWJIWDJ";
//console.log(inputSlotEquipe1.value);
var boutons = document.querySelectorAll(".boiteTour__pokemon__ajoutBouton");
console.log(boutons);

var bouton_1 = document.querySelector("#boiteTour__pokemon__ajoutBouton_1");
console.log(bouton_1);

/*

bouton_1.addEventListener('click', () => {
    console.log(bouton_1.textContent);
    inputSlotEquipe1.value = bouton_1.textContent;

    //var checkboxes = document.querySelectorAll('.equipe_checkbox_tour:checked');
    //console.log(checkboxes.length);
});
*/



boutons.forEach(function(bouton) {
    bouton.addEventListener('click', () => {
        console.log(bouton.textContent);
        inputSlotEquipe1.value = bouton.textContent;
    });
});
