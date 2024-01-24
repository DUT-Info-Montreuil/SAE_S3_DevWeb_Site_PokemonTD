function devoileMap3(){
    const myDiv = document.querySelector('#item1');

    myDiv.style.display = "none";
    myDiv.innerHTML = "";
    myDiv.classList.remove("item");
    myDiv.style.display = "flex";
    myDiv.classList.add("imageCarte");
    myDiv.id = "carteNiveau3";
}

function devoileMap2(){
    const myDiv = document.querySelector('#item2');
}

function devoileMap1(){
    const myDiv = document.querySelector('#item3');
}