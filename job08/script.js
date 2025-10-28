function estPremier(nombre) { // Fonction pour vérifier si un nombre est premier
    // Les nombres négatifs, 0 et 1 ne sont pas premiers
    if (nombre <= 1) return false;
    
    // Vérifier si le nombre est divisible par un entier entre 2 et sa racine carrée
    for (let i = 2; i <= Math.sqrt(nombre); i++) { // Boucle de 2 à la racine carrée du nombre
        if (nombre % i === 0) return false; // Si divisible, ce n'est pas un nombre premier
    }
    
    return true;
}

function sommenombrespremiers(n1, n2) { // Fonction pour sommer deux nombres premiers
    // Vérifier si les deux nombres sont premiers
    if (estPremier(n1) && estPremier(n2)) { // Si oui, retourner leur somme
        return n1 + n2; // Retourne la somme des deux nombres
    }
    return false;
}

// Tests avec différents nombres
console.log(sommenombrespremiers(2, 3));      // 5 (car 2 et 3 sont premiers)
console.log(sommenombrespremiers(3, 5));      // 8 (car 3 et 5 sont premiers)
console.log(sommenombrespremiers(4, 5));      // false (car 4 n'est pas premier)
console.log(sommenombrespremiers(1, 2));      // false (car 1 n'est pas premier)
console.log(sommenombrespremiers(13, 17));    // 30 (car 13 et 17 sont premiers)