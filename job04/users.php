<?php
// Configuration de la connexion à la base de données
$host = 'localhost';
$dbname = 'utilisateurs';
$username = 'root';  // Utilisateur par défaut de WAMP
$password = '';      // Mot de passe par défaut de WAMP

try {
    // Création de la connexion PDO
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );

    // Récupération de tous les utilisateurs
    $stmt = $pdo->query('SELECT * FROM utilisateurs');
    $users = $stmt->fetchAll();

    // Configuration des headers pour JSON
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');  // Pour permettre l'accès depuis n'importe quelle origine
    
    // Envoi des données en JSON
    echo json_encode($users);

} catch (PDOException $e) {
    // En cas d'erreur, on retourne un message d'erreur en JSON
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode(['error' => 'Erreur de base de données : ' . $e->getMessage()]);
}