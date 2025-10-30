// Attendre que le DOM soit complètement chargé
document.addEventListener("DOMContentLoaded", function() { // Initialisation du script
    // Récupérer le bouton et ajouter l'écouteur d'événement
    const button = document.getElementById("button");
    button.addEventListener("click", addone); // Ajout de l'événement click au bouton
});

function addone() { // Fonction pour incrémenter le compteur
    // Récupérer l'élément compteur
    const compteur = document.getElementById("compteur");
    
    // Convertir le contenu en nombre et l'incrémenter
    let nombre = parseInt(compteur.textContent); // Conversion en entier
    nombre++;
    
    // Mettre à jour l'affichage
    compteur.textContent = nombre;
}