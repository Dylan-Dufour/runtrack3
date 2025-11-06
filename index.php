<?php
session_start();
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Accueil</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <main>
    <h1>Page d'accueil</h1>

    <?php if (!empty($_SESSION['user'])): ?>
      <p>Bonjour <?php echo htmlspecialchars($_SESSION['user']['prenom'], ENT_QUOTES, 'UTF-8'); ?></p>
      <p><a href="logout.php">Se déconnecter</a></p>
    <?php else: ?>
      <p>
        <a href="inscription.php">Inscription</a> | <a href="connexion.php">Connexion</a>
      </p>
    <?php endif; ?>

  </main>
</body>
</html>
