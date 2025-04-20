<?php include '../components/header.php'; ?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["role_id"] = $user["role_id"]; // Assure l'enregistrement du rôle

            header("Location: ../index.php");
            exit;
        } else {
            echo "Identifiants incorrects.";
        }
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
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

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
        }

        input:focus {
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

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Se connecter</button>
</form>