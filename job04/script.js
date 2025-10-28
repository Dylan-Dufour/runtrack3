function bisextile(annee) {
    // Une année est bissextile si elle est divisible par 4 mais pas par 100,
    // sauf si elle est aussi divisible par 400
    if ((annee % 4 === 0 && annee % 100 !== 0) || (annee % 400 === 0)) { // Condition pour une année bissextile
        return true; // Retourne true si l'année est bissextile
    } else {
        return false; // Retourne false sinon
    }
}

// Exemple d'utilisation dans la console
console.log(bisextile(2020)); // true
console.log(bisextile(1900)); // false
console.log(bisextile(2000)); // true
console.log(bisextile(2023)); // false
