<?php
require_once __DIR__ . '/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { // vérification de la méthode
    json_response(['success' => false, 'errors' => ['global' => 'Méthode non autorisée']]); // réponse en cas de méthode incorrecte
}

$input = json_decode(file_get_contents('php://input'), true) ?? $_POST;
$prenom = trim($input['prenom'] ?? '');
$nom = trim($input['nom'] ?? '');
$email = trim($input['email'] ?? '');
$password = $input['password'] ?? '';
$confirm = $input['confirm'] ?? '';

$errors = [];
if ($nom === '') $errors['nom'] = 'Nom requis.'; // validation du nom
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = 'Email invalide.'; // validation de l'email
if (strlen($password) < 8) $errors['password'] = 'Le mot de passe doit faire au moins 8 caractères.'; // validation de la longueur du mot de passe
if ($password !== $confirm) $errors['confirm'] = 'Les mots de passe ne correspondent pas.'; // validation de la confirmation

// password complexity: must contain letters and numbers
if (!preg_match('/[a-zA-Z]/', $password) || !preg_match('/\d/', $password)) { // validation de la complexité du mot de passe
    $errors['password'] = ($errors['password'] ?? '') . ' Doit contenir lettres et chiffres.';
}

// check email uniqueness
if (!isset($errors['email'])) {
    $stmt = $pdo->prepare('SELECT id FROM utilisateurs WHERE email = ? LIMIT 1');
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        $errors['email'] = 'Email déjà utilisé.';
    }
}

if (!empty($errors)) {
    json_response(['success' => false, 'errors' => $errors]);
}

$hash = password_hash($password, PASSWORD_DEFAULT);
$stmt = $pdo->prepare('INSERT INTO utilisateurs (nom, prenom, email, password) VALUES (?, ?, ?, ?)');
try {
    $stmt->execute([$nom, $prenom, $email, $hash]);
    json_response(['success' => true]);
} catch (Exception $e) {
    json_response(['success' => false, 'errors' => ['global' => 'Erreur lors de la création du compte.']]);
}
