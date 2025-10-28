function jourtravaille(date) { // Fonction pour vérifier si une date est un jour travaillé
    // Liste des jours fériés 2020
    const joursFeries2020 = [
        new Date(2020, 0, 1),   // Jour de l'an
        new Date(2020, 3, 13),  // Lundi de Pâques
        new Date(2020, 4, 1),   // Fête du travail
        new Date(2020, 4, 8),   // Victoire 1945
        new Date(2020, 4, 21),  // Ascension
        new Date(2020, 5, 1),   // Lundi de Pentecôte
        new Date(2020, 6, 14),  // Fête nationale
        new Date(2020, 7, 15),  // Assomption
        new Date(2020, 10, 1),  // Toussaint
        new Date(2020, 10, 11), // Armistice
        new Date(2020, 11, 25)  // Noël
    ];

    // Formater la date pour l'affichage
    const options = { day: 'numeric', month: 'long', year: 'numeric' };
    const dateStr = date.toLocaleDateString('fr-FR', options);

    // Vérifier si c'est un jour férié
    const estFerie = joursFeries2020.some(jour => 
        jour.getDate() === date.getDate() &&  // Comparer le jour
        jour.getMonth() === date.getMonth() &&  // Comparer le mois
        jour.getFullYear() === date.getFullYear()  // Comparer l'année
    );

    if (estFerie) { // Si c'est un jour férié
        console.log(`Le ${dateStr} est un jour férié`); // Afficher message férié
        return;
    }

    // Vérifier si c'est un weekend
    const jourSemaine = date.getDay(); // 0 = dimanche, 6 = samedi
    if (jourSemaine === 0 || jourSemaine === 6) { // 0 = dimanche, 6 = samedi
        console.log(`Non, ${dateStr} est un week-end`); // Afficher message weekend
        return;
    }

    // Si ce n'est ni férié ni weekend, c'est un jour travaillé
    console.log(`Oui, ${dateStr} est un jour travaillé`); // Afficher message jour travaillé
}

// Tests avec différentes dates de 2020
jourtravaille(new Date(2020, 0, 1));   // 1er janvier 2020 (férié)
jourtravaille(new Date(2020, 0, 4));   // 4 janvier 2020 (samedi)
jourtravaille(new Date(2020, 0, 6));   // 6 janvier 2020 (lundi travaillé)
jourtravaille(new Date(2020, 4, 1));   // 1er mai 2020 (férié)
jourtravaille(new Date(2020, 6, 14));  // 14 juillet 2020 (férié)