<?php
// Paramètres de connexion à la base de données
$host = "localhost"; // Adresse du serveur MySQL
$dbname = "getticket"; // Nom de la base de données
$username = "root"; // Nom d'utilisateur MySQL
$password = "root"; // Mot de passe MySQL

try {
    $conn = new PDO("mysql:host=localhost;dbname=getticket;charset=utf8mb4", "root", "root");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie !"; // Test pour voir si la connexion marche
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
