<?php
require_once __DIR__ . '/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { // vérification de la méthode
    json_response(['success' => false, 'errors' => ['global' => 'Méthode non autorisée']]); // réponse en cas de méthode incorrecte
}

$input = json_decode(file_get_contents('php://input'), true) ?? $_POST; // récupération des données
$email = trim($input['email'] ?? ''); // extraction de l'email
$password = $input['password'] ?? ''; // extraction du mot de passe

$errors = [];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = 'Email invalide.'; // validation de l'email
if ($password === '') $errors['password'] = 'Mot de passe requis.'; // validation du mot de passe

if (!empty($errors)) json_response(['success' => false, 'errors' => $errors]); // réponse en cas d'erreurs de validation

$stmt = $pdo->prepare('SELECT id, nom, prenom, email, password FROM utilisateurs WHERE email = ? LIMIT 1'); // préparation de la requête
$stmt->execute([$email]); // exécution avec l'email fourni
$user = $stmt->fetch(); // récupération de l'utilisateur

if (!$user || !password_verify($password, $user['password'])) { // vérification des identifiants
    json_response(['success' => false, 'errors' => ['global' => 'Email ou mot de passe incorrect.']]); // réponse en cas d'échec
}

// Connexion réussie
$_SESSION['user'] = [
    'id' => $user['id'],
    'nom' => $user['nom'],
    'prenom' => $user['prenom'],
    'email' => $user['email'],
];

json_response(['success' => true]); // réponse en cas de succès
