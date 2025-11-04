const button = document.getElementById("btn");
const buttonMasque = document.getElementById("none");
const textElement = document.getElementById("text");
button.addEventListener("click", function() {
    textElement.style.display = "block";
    textElement.textContent = "Les logiciels et les cathédrales, c'est un peu la même chose - d'abord on les construit,ensuite on prie.";   

});
buttonMasque.addEventListener("click", function() {    
    textElement.style.display = "none";

});

