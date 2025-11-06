<?php
// db.php - connexion PDO. Ajustez les identifiants selon votre configuration WAMP.
declare(strict_types=1);

$dbHost = '127.0.0.1';
$dbName = 'utilisateurs';
$dbUser = 'root';
$dbPass = '';

try { // connexion PDO
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4", $dbUser, $dbPass, [ // options PDO
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // mode erreur
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // mode fetch par défaut
    ]);
} catch (PDOException $e) {
    // En prod, ne pas afficher l'erreur brute.
    http_response_code(500); // code erreur serveur
    echo 'Erreur de connexion à la base de données.';
    exit;
}

// helper pour répondre JSON
function json_response($data) { // fonction helper
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
    exit;
}
