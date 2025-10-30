function showhide() { // Fonction pour afficher ou masquer un article
    // Vérifie si l'article existe déjà
    let article = document.getElementById("article"); // Récupération de l'article par son id
    
    if (article) {
        // Si l'article existe, on le supprime
        article.remove();
    } else {
        // Si l'article n'existe pas, on le crée
        article = document.createElement("article");
        article.id = "article"; // On lui donne un id pour pouvoir le retrouver
        article.textContent = "L'important n'est pas la chute, mais l'atterrissage."; // Texte de l'article
        
        // On ajoute l'article au body
        document.body.appendChild(article);
    }
}