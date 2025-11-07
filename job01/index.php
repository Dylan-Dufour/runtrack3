<?php
// index.php
?><!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription - Exemple</title>
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">
    <header class="bg-white shadow">
        <div class="max-w-4xl mx-auto px-4 py-4 flex items-center justify-between">
            <h1 class="text-xl font-semibold">Mon site</h1>
            <nav class="space-x-4">
                <a class="text-gray-600 hover:text-blue-600" href="index.php">Accueil</a>
                <a class="text-gray-600 hover:text-blue-600" href="index.php">Inscription</a>
                <a class="text-gray-600 hover:text-blue-600" href="index.php">Connexion</a>
                <a class="text-gray-600 hover:text-blue-600" href="index.php">Rechercher</a>
            </nav>
        </div>
    </header>

    <main class="max-w-4xl mx-auto px-4 py-8">
        <section class="bg-white rounded-lg shadow p-6">
            <h2 class="text-2xl font-bold mb-4">Créer un compte</h2>
            <form method="post" action="index.php" novalidate class="space-y-4">
                <fieldset class="border border-gray-200 rounded p-4">
                    <legend class="text-sm font-semibold">Civilité</legend>
                    <div class="mt-2 flex items-center gap-4">
                        <label class="inline-flex items-center gap-2"><input type="radio" name="civilite" value="M." required class="form-radio text-blue-600"> <span>M.</span></label>
                        <label class="inline-flex items-center gap-2"><input type="radio" name="civilite" value="Mme" class="form-radio text-blue-600"> <span>Mme</span></label>
                        <label class="inline-flex items-center gap-2"><input type="radio" name="civilite" value="Autre" class="form-radio text-blue-600"> <span>Autre</span></label>
                    </div>
                </fieldset>

                <div>
                    <label for="prenom" class="block text-sm font-medium">Prénom</label>
                    <input type="text" id="prenom" name="prenom" required class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-200">
                </div>

                <div>
                    <label for="nom" class="block text-sm font-medium">Nom</label>
                    <input type="text" id="nom" name="nom" required class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-200">
                </div>

                <div>
                    <label for="adresse" class="block text-sm font-medium">Adresse</label>
                    <input type="text" id="adresse" name="adresse" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-200">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium">Adresse email</label>
                    <input type="email" id="email" name="email" required class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-200">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="password" class="block text-sm font-medium">Mot de passe</label>
                        <input type="password" id="password" name="password" required class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    </div>
                    <div>
                        <label for="password_confirm" class="block text-sm font-medium">Confirmez le mot de passe</label>
                        <input type="password" id="password_confirm" name="password_confirm" required class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    </div>
                </div>

                <fieldset class="border border-gray-200 rounded p-4">
                    <legend class="text-sm font-semibold">Passions</legend>
                    <div class="mt-2 flex flex-wrap gap-4">
                        <label class="inline-flex items-center gap-2"><input type="checkbox" name="passions[]" value="informatique" class="form-checkbox text-blue-600"> <span>Informatique</span></label>
                        <label class="inline-flex items-center gap-2"><input type="checkbox" name="passions[]" value="voyages" class="form-checkbox text-blue-600"> <span>Voyages</span></label>
                        <label class="inline-flex items-center gap-2"><input type="checkbox" name="passions[]" value="sport" class="form-checkbox text-blue-600"> <span>Sport</span></label>
                        <label class="inline-flex items-center gap-2"><input type="checkbox" name="passions[]" value="lecture" class="form-checkbox text-blue-600"> <span>Lecture</span></label>
                    </div>
                </fieldset>

                <div>
                    <button type="submit" class="w-full md:w-auto bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Valider</button>
                </div>
            </form>
        </section>
    </main>

    <footer class="bg-white border-t">
        <div class="max-w-4xl mx-auto px-4 py-4">
            <ul class="flex justify-center gap-6 text-sm">
                <li><a class="text-gray-600 hover:text-blue-600" href="index.php">Accueil</a></li>
                <li><a class="text-gray-600 hover:text-blue-600" href="index.php">Inscription</a></li>
                <li><a class="text-gray-600 hover:text-blue-600" href="index.php">Connexion</a></li>
                <li><a class="text-gray-600 hover:text-blue-600" href="index.php">Rechercher</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>