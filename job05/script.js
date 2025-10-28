function afficherjourssemaines() { // Fonction pour afficher les jours de la semaine
    const jourssemaines = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"]; // Tableau des jours de la semaine
    
    for (let i = 0; i < jourssemaines.length; i++) { // Boucle pour parcourir le tableau
        console.log(jourssemaines[i]); // Affiche chaque jour dans la console
    }
}

// Appel de la fonction pour tester
afficherjourssemaines();