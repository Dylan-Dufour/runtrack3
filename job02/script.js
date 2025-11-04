function jsonValueKey(jsonString, key) {
  try {
    // On tente de parser la chaîne JSON en objet JavaScript
    const obj = JSON.parse(jsonString);
    
    // On retourne la valeur correspondant à la clé
    return obj[key];
  } catch (error) {
    // Si la chaîne n’est pas un JSON valide, on renvoie une erreur
    console.error("Format JSON invalide :", error);
    return null;
  }
}

// Exemple d’utilisation :
const jsonStr = `{
  "name": "La Plateforme_",
  "address": "8 rue d'hozier",
  "city": "Marseille",
  "nb_staff": "11",
  "creation": "2019"
}`;

console.log(jsonValueKey(jsonStr, "city")); // Affiche : Marseille
