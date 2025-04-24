<?php
require_once '../db_connect.php';
include '../../components/header.php';

// Vérifier si l'utilisateur est administrateur
if (!isset($_SESSION["role_id"]) || $_SESSION["role_id"] !== 2) {
    die("Accès refusé.");
}

// Récupérer l'ID de l'utilisateur à modifier
if (!isset($_GET["id"])) {
    die("ID utilisateur manquant.");
}

$user_id = $_GET["id"];

// Récupérer les infos de l'utilisateur
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("Utilisateur introuvable.");
}

// Traitement de la mise à jour
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $role = $_POST["role_id"];

    $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, role = ? WHERE id = ?");
    $stmt->execute([$username, $email, $role, $user_id]);

    header("Location: manage_users.php");
    exit();
}
?>

<h2>Modifier l'utilisateur</h2>
<form method="post" class="form-container">
    <style>
        h2 {
            text-align: center;
            color: #333;
        }

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
    <input type="text" id="username" name="username" value="<?= htmlspecialchars($user["username"]) ?>" required>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($user["email"]) ?>" required>

    <label for="role_id">Rôle :</label>
    <select id="role_id" name="role_id">
        <option value="user" <?= $user["role_id"] == "user" ? "selected" : "" ?>>Utilisateur</option>
        <option value="helpeur" <?= $user["role_id"] == "helpeur" ? "selected" : "" ?>>Helpeur</option>
        <option value="admin" <?= $user["role_id"] == "admin" ? "selected" : "" ?>>Administrateur</option>
    </select>

    <button type="submit">Mettre à jour</button>
</form>