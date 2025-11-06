<?php
session_start();
$_SESSION = [];
if (ini_get('session.use_cookies')) { // suppression du cookie de session
    $params = session_get_cookie_params(); // obtenir les paramètres du cookie
    setcookie(session_name(), '', time() - 42000, // supprimer le cookie
        $params['path'], $params['domain'], $params['secure'], $params['httponly'] // options
    );
}
session_destroy(); // destruction de la session
header('Location: index.php'); // redirection vers la page d'accueil
exit; // fin du script
