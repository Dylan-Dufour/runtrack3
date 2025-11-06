Simple application d'inscription/connexion

Fichiers créés :

- `database.sql` : script SQL pour créer la base `utilisateurs` et la table `utilisateurs`.
- `db.php` : connexion PDO (à adapter selon votre user/password MySQL/WAMP).
- `index.php` : page d'accueil (affiche "Bonjour $prenom" si connecté).
- `inscription.php` : page d'inscription (formulaire, validations JS, envoi AJAX vers `register.php`).
- `register.php` : endpoint PHP pour enregistrer l'utilisateur (retour JSON).
- `connexion.php` : page de connexion (formulaire, validations JS, envoi AJAX vers `login.php`).
- `login.php` : endpoint PHP pour authentifier (retour JSON, crée session).
- `check_email.php` : endpoint AJAX pour vérifier si une adresse email existe.
- `logout.php` : déconnexion et redirection vers `index.php`.
- `assets/js/form.js` : validations côté client + fetch pour les endpoints.
- `assets/css/style.css` : styles simples.

Installation rapide :

1. Placez ce dossier dans votre serveur WAMP (ex : `C:/wamp64/www/runtrack3/jour05/job01`).
2. Importez `database.sql` dans MySQL via phpMyAdmin ou mysql CLI pour créer la base.
3. Éditez `db.php` si nécessaire (utilisateur/mot de passe MySQL).
4. Ouvrez `http://localhost/runtrack3/jour05/job01/index.php` dans votre navigateur.

Remarques :

- Les vérifications sont faites côté client (JavaScript) et validées côté serveur également.
- Les retours sont en JSON pour permettre le fonctionnement sans rechargement de page.
- Adaptations possibles : améliorer la complexité du mot de passe, ajouter token CSRF, validation côté serveur plus stricte.
