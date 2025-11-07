<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reproduction Showcase Tailwind</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brand: '#0ea5a4',  // exemple couleur personnalisée
            accent: '#ff6b6b'
          }
        }
      }
    }
  </script>
</head>
<body class="bg-gray-100 text-gray-800">
  <!-- Hero -->
  <header class="bg-white shadow-md">
    <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
      <h1 class="text-2xl font-bold">Tailwind</h1>
      <nav class="space-x-4 text-sm">
        <a href="#" class="hover:text-brand transition">Accueil</a>
        <a href="#" class="hover:text-brand transition">Fonctionnalités</a>
        <a href="#" class="hover:text-brand transition">Tarifs</a>
      </nav>
    </div>
  </header>

  <section class="max-w-6xl mx-auto px-6 py-16 flex flex-col md:flex-row items-center gap-12">
    <div class="flex-1">
      <h2 class="text-4xl font-extrabold mb-4">Titre fort ici</h2>
      <p class="mb-6 text-lg">Un paragraphe accrocheur qui explique le service.</p>
      <a href="#" class="inline-block bg-brand text-white font-semibold px-6 py-3 rounded-lg shadow-lg hover:shadow-xl transition">Commencer maintenant</a>
    </div>
    <div class="flex-1">
      <img src="https://www.dongee.com/tutoriales/content/images/2023/10/image-7.png" alt="Illustration" class="w-full rounded-xl shadow-lg">
    </div>
  </section>

  <footer class="bg-gray-800 text-gray-300">
    <div class="max-w-6xl mx-auto px-6 py-8 flex flex-col md:flex-row justify-between items-center">
      <p>&copy; <?= date('Y') ?> Mon Projet. Tous droits réservés.</p>
      <div class="space-x-4 mt-4 md:mt-0">
        <a href="#" class="hover:text-white">Privacy</a>
        <a href="#" class="hover:text-white">Terms</a>
        <a href="#" class="hover:text-white">Contact</a>
      </div>
    </div>
  </footer>
</body>
</html>
<?php date_default_timezone_set('Europe/Paris'); ?>