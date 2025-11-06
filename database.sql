-- Création de la base de données et de la table utilisateurs
CREATE DATABASE IF NOT EXISTS `utilisateurs` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `utilisateurs`;

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(100) NOT NULL,
  `prenom` VARCHAR(100) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Exemple: INSERT INTO `utilisateurs` (nom, prenom, email, password) VALUES ('Dupont', 'Jean', 'jean@example.com', '<hashed_password>');
