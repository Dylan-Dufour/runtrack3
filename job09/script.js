function tri(numbers, order) { // Fonction pour trier un tableau de nombres
    return numbers.sort((a, b) => { // Utilisation de la méthode sort avec une fonction de comparaison
        if (order === "asc") { // Tri ascendant
            return a - b; // Soustraction pour ordre croissant
        } else if (order === "desc") { // Tri descendant
            return b - a; // Soustraction pour ordre décroissant
        }
    });
}

// Tests avec différents tableaux et ordres
let tableau1 = [3, 1, 4, 1, 5, 9, 2, 6, 5, 3, 5];
let tableau2 = [10, 20, 5, 15, 25, 30];

// Test tri ascendant
console.log("Tri ascendant tableau1:", tri([...tableau1], "asc")); // Utilisation de l'opérateur spread pour ne pas modifier l'original
console.log("Tri ascendant tableau2:", tri([...tableau2], "asc")); // Utilisation de l'opérateur spread pour ne pas modifier l'original

// Test tri descendant
console.log("Tri descendant tableau1:", tri([...tableau1], "desc")); // Utilisation de l'opérateur spread pour ne pas modifier l'original
console.log("Tri descendant tableau2:", tri([...tableau2], "desc")); // Utilisation de l'opérateur spread pour ne pas modifier l'original