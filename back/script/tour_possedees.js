
/*
const el = document.querySelector('#tour_2');
el.addEventListener('click', () => {
    console.log('Tu as cliqué')
});
*/
//var checkboxes = document.querySelectorAll('.equipe_checkbox_tour');
//var m = equipe_checkbox_tour

const el = document.querySelector('#tour_2');
el.addEventListener('click', () => {
    //console.log('Tu as cliqué')
    var checkboxes = document.querySelectorAll('.equipe_checkbox_tour:checked');
    console.log(checkboxes.length);
});