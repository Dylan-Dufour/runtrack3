function fizzbuzz() { // Fonction pour le jeu FizzBuzz
    for (let i = 1; i <= 151; i++) { // Boucle de 1 à 151
        if (i % 3 === 0 && i % 5 === 0) { // Condition pour les multiples de 3 et 5
            console.log("FizzBuzz"); // Affiche "FizzBuzz"
        }
        else if (i % 3 === 0) { // Condition pour les multiples de 3
            console.log("Fizz"); // Affiche "Fizz"
        }
        else if (i % 5 === 0) { // Condition pour les multiples de 5
            console.log("Buzz"); // Affiche "Buzz"
        }
        else {
            console.log(i); // Affiche le nombre lui-même
        }
    }
}

// Appel de la fonction
fizzbuzz();