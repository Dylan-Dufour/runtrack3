<?php session_start(); ?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Connexion</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <main>
    <h1>Connexion</h1>
    <form id="loginForm" novalidate>
      <label>Email<br>
        <input type="email" name="email" id="login-email">
        <div class="error" id="err-login-email"></div>
      </label>

      <label>Mot de passe<br>
        <input type="password" name="password" id="login-password">
        <div class="error" id="err-login-password"></div>
      </label>

      <button type="submit">Se connecter</button>
    </form>

    <p>Pas encore de compte ? <a href="inscription.php">Inscrivez-vous</a></p>
  </main>

  <script src="assets/js/form.js"></script>
</body>
</html>
