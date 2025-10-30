// Attendre que le DOM soit complètement chargé
document.addEventListener("DOMContentLoaded", function() {
    // Récupérer le textarea
    const keylogger = document.getElementById("keylogger");

    // Ajouter un écouteur d'événement sur tout le document
    document.addEventListener("keypress", function(event) {
        // Vérifier si c'est une lettre de a à z (minuscule ou majuscule)
        if (/^[a-zA-Z]$/.test(event.key)) {
            // Si le focus est dans le textarea, ajouter la lettre deux fois
            if (document.activeElement === keylogger) {
                keylogger.value += event.key + event.key;
            }
            // Sinon, ajouter la lettre une seule fois
            else {
                keylogger.value += event.key;
            }
        }
    });
});