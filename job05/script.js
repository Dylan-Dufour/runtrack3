// Attendre que le DOM soit complètement chargé
document.addEventListener("DOMContentLoaded", function() {
    const footer = document.querySelector("footer");
    
    // Fonction pour mettre à jour la couleur du footer
    function updateFooterColor() {
        // Calculer le pourcentage de scroll
        const hauteurTotale = document.documentElement.scrollHeight - window.innerHeight; // Hauteur totale défilable
        const positionScroll = window.scrollY; // Position actuelle du scroll
        const pourcentageScroll = (positionScroll / hauteurTotale) * 100; // En pourcentage

        // Convertir le pourcentage en une couleur RGB
        // Rouge diminue et Vert augmente au fur et à mesure du scroll
        const rouge = Math.floor(255 * (100 - pourcentageScroll) / 100);
        const vert = Math.floor(255 * pourcentageScroll / 100);
        
        // Appliquer la nouvelle couleur
        footer.style.backgroundColor = `rgb(${rouge}, ${vert}, 0)`;
    }

    // Ajouter l'écouteur d'événement pour le scroll
    window.addEventListener("scroll", updateFooterColor);
});