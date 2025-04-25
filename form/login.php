<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'db_connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        // Vérifier si l'utilisateur existe
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["role"] = $user["role_id"]; // User ou Admin

            // Redirection selon le rôle
            if ($user["role"] === "admin") {
                header("Location: dashboard.php");
            } else {
                header("Location: /home.php");
            }
            exit();
        } else {
            $error_message = "Identifiants incorrects.";
        }
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="/style/form.css">
</head>

<body>

    <header>
        <h1>Connexion à votre compte</h1>
    </header>

    <main>
        <section class="login-container">
            <h2>Connexion</h2>
            <?php if (isset($error_message)) : ?>
                <p class="error"><?= htmlspecialchars($error_message) ?></p>
            <?php endif; ?>
            <form method="post">
                <div class="input-group">
                    <label>Email :</label>
                    <input type="email" name="email" placeholder="Entrez votre email" required>
                </div>

                <div class="input-group">
                    <label>Mot de passe :</label>
                    <input type="password" name="password" placeholder="Entrez votre mot de passe" required>
                </div>

                <button type="submit" class="btn">Se connecter</button>
            </form>
        </section>
    </main>


    <footer>
        <p>&copy; 2025 Support Ticket - Tous droits réservés.</p>
    </footer>

</body>

</html>