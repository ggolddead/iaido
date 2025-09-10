<?php
// Connexion à la base de données (modifie les infos selon ton serveur)
$host = 'localhost';
$db = 'site_cookie';
$user = 'root';
$pass = '';
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Récupère les données JSON envoyées par le JS
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['cookie']) && isset($data['nom'])) {
    $cookie = $data['cookie'];
    $nom = $data['nom'];

    // Insère ou met à jour le nom utilisateur en fonction du cookie
    $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom_cookie, nom_utilisateur)
                           VALUES (:cookie, :nom)
                           ON DUPLICATE KEY UPDATE nom_utilisateur = :nom");
    $stmt->execute(['cookie' => $cookie, 'nom' => $nom]);
}
?>
