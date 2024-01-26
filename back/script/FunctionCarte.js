function devoileMap3() {
    const myDiv = document.querySelector('#item1');
    swapClass(myDiv);
    myDiv.id = "carteNiveau3";

    myDiv.innerHTML =
        "<h2>Carmin sur mer</h2>"
    ;
}

function devoileMap2() {
    const myDiv = document.querySelector('#item2');
    swapClass(myDiv);
    myDiv.id = "carteNiveau2";

    myDiv.innerHTML =
        "<h2>Frimapic</h2>"
    ;
}

function devoileMap1() {
    const myDiv = document.querySelector('#item3');
    swapClass(myDiv);
    myDiv.id = "carteNiveau1";

    myDiv.innerHTML =
        "<h2>Safrania</h2>"
    ;
}

function swapClass(div) {
    div.style.display = "none";
    div.innerHTML = "";
    div.classList.remove("item");
    div.style.display = "flex";
    div.classList.add("imageCarte");
}