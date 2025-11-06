<?php session_start(); ?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Inscription</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <main>
    <h1>Inscription</h1>
    <form id="registerForm" novalidate>    

      <label>Nom<br>
        <input type="text" name="nom" id="nom">
        <div class="error" id="err-nom"></div>
      </label>

      <label>Email<br>
        <input type="email" name="email" id="email">
        <div class="error" id="err-email"></div>
      </label>

      <label>Mot de passe<br>
        <input type="password" name="password" id="password">
        <div class="error" id="err-password"></div>
      </label>

      <label>Confirmation<br>
        <input type="password" name="confirm" id="confirm">
        <div class="error" id="err-confirm"></div>
      </label>

      <button type="submit">S'inscrire</button>
    </form>

    <p>Vous avez déjà un compte ? <a href="connexion.php">Connectez-vous</a></p>

  </main>

  <script src="assets/js/form.js"></script>
</body>
</html>
