<?php
require_once __DIR__ . '/db.php'; // ajouté pour inclure la connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { // corrigé pour vérifier la méthode POST
    json_response(['error' => 'Méthode non autorisée']); // corrigé pour renvoyer une clé 'error' cohérente
}

$data = json_decode(file_get_contents('php://input'), true) ?? $_POST; // corrigé pour utiliser le corps de la requête
$email = trim($data['email'] ?? ''); // corrigé pour extraire l'email

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // corrigé pour valider l'email
    json_response(['exists' => false]); // si l'email n'est pas valide, on considère qu'il n'existe pas
}

$stmt = $pdo->prepare('SELECT id FROM utilisateurs WHERE email = ? LIMIT 1'); // préparé pour vérifier l'existence de l'email
$stmt->execute([$email]); // exécuté avec l'email fourni
$exists = (bool)$stmt->fetch(); // corrigé pour caster en booléen

json_response(['exists' => $exists]); // renvoyé le résultat
