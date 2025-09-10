-- 1. Crée la base de données (si pas encore créée)
CREATE DATABASE site_cookie;

-- 2. Utilise cette base
USE site_cookie;
USE undex.html;

-- 3. Crée la table "utilisateurs"
CREATE TABLE utilisateurs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom_cookie VARCHAR(100) UNIQUE, -- nom stocké dans le cookie (identifiant)
  nom_utilisateur VARCHAR(100),   -- prénom ou nom affiché
  date_visite DATETIME DEFAULT CURRENT_TIMESTAMP
);
