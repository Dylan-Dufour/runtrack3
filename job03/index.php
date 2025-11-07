<?php
// index.php
// Exemple d'un header et footer stylés uniquement avec les classes Tailwind (CDN)
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exemple Tailwind Header et Footer</title>

  <!-- CDN Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brand: '#0ea5a4'
          }
        }
      }
    }
  </script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

  <!-- Header stylisé -->
  <header class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 text-white">
    <div class="max-w-6xl mx-auto px-4 py-6 flex items-center justify-between">
      <div class="flex items-center gap-3">
        <span class="inline-block w-10 h-10 rounded-full bg-white/20 flex items-center justify-center text-xl font-bold">TI</span>
        <h1 class="text-lg font-semibold">Mon site coloré</h1>
      </div>
      <nav class="hidden md:flex items-center gap-6 text-sm font-medium">
        <a href="#" class="hover:underline">Accueil</a>
        <a href="#" class="hover:underline">À propos</a>
        <a href="#" class="hover:underline">Contact</a>
      </nav>
      <div class="md:hidden">
        <button aria-label="Ouvrir le menu" class="bg-white/20 px-3 py-2 rounded-md">Menu</button>
      </div>
    </div>
  </header>

  <!-- Contenu principal -->
  <main class="flex-grow max-w-6xl mx-auto px-4 py-12">
    <p class="text-gray-700">Exemple d'un header et d'un footer colorés et alignés sans fichier CSS externe — uniquement des classes Tailwind appliquées dans le markup.</p>
  </main>

  <!-- Footer stylisé -->
  <footer class="bg-gradient-to-r from-pink-500 via-purple-600 to-indigo-600 text-white">
    <div class="max-w-6xl mx-auto px-4 py-6 flex flex-col md:flex-row items-center justify-between gap-4">
      <p class="text-sm">&copy; <?php echo date('Y'); ?> Mon site coloré. Tous droits réservés.</p>
      <div class="flex items-center gap-6 text-sm">
        <a href="#" class="hover:underline">Mentions légales</a>
        <a href="#" class="hover:underline">Confidentialité</a>
        <a href="#" class="hover:underline">Contact</a>
      </div>
    </div>
  </footer>

</body>
</html>
