<?php
// index.php
// Exemple complet : header, formulaire moderne et footer stylés avec Tailwind (CDN)
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exemple Tailwind Formulaire Moderne</title>

  <!-- CDN Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/lucide@latest"></script>
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
  <main class="flex-grow max-w-3xl mx-auto px-6 py-12">
    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-8">Formulaire de contact</h2>

    <form action="#" method="post" class="bg-white/90 shadow-xl rounded-2xl p-8 space-y-6 backdrop-blur-md">
      <!-- Nom -->
      <div class="flex items-center border border-gray-200 rounded-xl p-3 bg-gray-50 hover:bg-white transition">
        <i data-lucide="user" class="w-5 h-5 text-gray-500 mr-3"></i>
        <input type="text" name="nom" placeholder="Votre nom" class="w-full bg-transparent focus:outline-none text-gray-700" required>
      </div>

      <!-- Email -->
      <div class="flex items-center border border-gray-200 rounded-xl p-3 bg-gray-50 hover:bg-white transition">
        <i data-lucide="mail" class="w-5 h-5 text-gray-500 mr-3"></i>
        <input type="email" name="email" placeholder="Votre adresse e-mail" class="w-full bg-transparent focus:outline-none text-gray-700" required>
      </div>

      <!-- Message -->
      <div class="flex items-start border border-gray-200 rounded-xl p-3 bg-gray-50 hover:bg-white transition">
        <i data-lucide="message-circle" class="w-5 h-5 text-gray-500 mr-3 mt-1"></i>
        <textarea name="message" rows="4" placeholder="Votre message..." class="w-full bg-transparent focus:outline-none text-gray-700 resize-none" required></textarea>
      </div>

      <!-- Bouton -->
      <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 text-white font-semibold py-3 rounded-xl shadow-md hover:opacity-90 transition">Envoyer</button>
    </form>
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

  <script>
    lucide.createIcons();
  </script>

</body>
</html>