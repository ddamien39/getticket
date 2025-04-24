<?php
include '../components/header.php';
require_once 'db_connect.php';
session_start();

// Vérifier si l'utilisateur est administrateur
if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] !== 2) {
    die("Accès refusé : seuls les administrateurs peuvent inscrire un nouvel utilisateur.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $role = $_POST["role_id"]; // Admin, Helpeur, User

    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password, role_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$username, $email, $password, $role]);
        echo "Utilisateur inscrit avec succès !";
    } catch (PDOException $e) {
        die("Erreur lors de l'inscription : " . $e->getMessage());
    }
}
?>

<form method="post" class="form-container">
    <style>
        .form-container {
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
        }

        input:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            background: #007bff;
            color: white;
            font-weight: bold;
            padding: 10px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #0056b3;
        }
    </style>

    <label for="username">Nom d'utilisateur :</label>
    <input type="text" id="username" name="username" required>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>

    <label for="role_id">Rôle :</label>
    <select id="role_id" name="role_id">
        <option value="1">Utilisateur</option>
        <option value="2">Administrateur</option>
    </select>

    <button type="submit">Inscrire</button>
</form>