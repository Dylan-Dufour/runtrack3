<?php
// index.php
// Exemple d'un header stylé uniquement avec les classes Tailwind (CDN)
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exemple Tailwind Header</title>

  <!-- 1) Option simple : CDN Tailwind (aucun fichier CSS requis) -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- (optionnel) configuration rapide Tailwind inline -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            // couleur personnalisée exemple
            brand: '#0ea5a4'
          }
        }
      }
    }
  </script>

  <!-- Si vous préférez la build CLI, supprimez le CDN ci‑dessus et incluez votre fichier dist/output.css -->
  <!-- <link rel="stylesheet" href="/dist/output.css"> -->
</head>
<body class="bg-gray-50 min-h-screen">

  <!-- Header stylisé uniquement avec classes Tailwind -->
  <header class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 text-white">
    <div class="max-w-6xl mx-auto px-4 py-6 flex items-center justify-between">

      <!-- Logo / titre aligné à gauche -->
      <div class="flex items-center gap-3">
        <span class="inline-block w-10 h-10 rounded-full bg-white/20 flex items-center justify-center text-xl font-bold">TI</span>
        <h1 class="text-lg font-semibold">Mon site coloré</h1>
      </div>

      <!-- Navigation alignée à droite -->
      <nav class="hidden md:flex items-center gap-6 text-sm font-medium">
        <a href="#" class="hover:underline">Accueil</a>
        <a href="#" class="hover:underline">À propos</a>
        <a href="#" class="hover:underline">Contact</a>
      </nav>

      <!-- Bouton / menu mobile -->
      <div class="md:hidden">
        <button aria-label="Ouvrir le menu" class="bg-white/20 px-3 py-2 rounded-md">Menu</button>
      </div>

    </div>
  </header>

  <!-- Contenu de démonstration -->
  <main class="max-w-6xl mx-auto px-4 py-12">
    <p class="text-gray-700">Exemple d'un header coloré et aligné sans fichier CSS externe — uniquement des classes Tailwind appliquées dans le markup.</p>
  </main>

</body>
</html>
