-- Création de la base de données
CREATE DATABASE IF NOT EXISTS utilisateurs;
USE utilisateurs;

-- Création de la table utilisateurs
CREATE TABLE IF NOT EXISTS utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);

-- Insertion de quelques utilisateurs de test
INSERT INTO utilisateurs (nom, prenom, email) VALUES
('Dupont', 'Jean', 'jean.dupont@email.com'),
('Martin', 'Sophie', 'sophie.martin@email.com'),
('Bernard', 'Michel', 'michel.bernard@email.com'),
('Petit', 'Marie', 'marie.petit@email.com');