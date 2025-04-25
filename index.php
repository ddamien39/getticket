<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();



// Vérifier si l'utilisateur est connecté
$isLoggedIn = isset($_SESSION["username"]);
$username = $isLoggedIn ? $_SESSION["username"] : "Invité";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Ticket - Accueil</title>
    <link rel="stylesheet" href="/style/home.css">
</head>

<body>

    <header>
        <h1>Bienvenue sur GetTicket</h1>
        <nav>
            <a href="create_ticket.php" class="btn">Créer un Ticket</a>
            <a href="user_tickets.php">Mes Tickets</a>
            <a href="messages.php">Messages</a>

            <?php if ($isLoggedIn && $_SESSION["role"] == 2) : ?>
                <a href="/pages/index.php" class="admin-btn">Administration</a>
            <?php endif; ?>


            <?php if ($isLoggedIn) : ?>
                <a href="/form/logout.php" class="logout-btn">Déconnexion</a>
            <?php else : ?>
                <a href="/form/login.php" class="login-btn">Connexion</a>
            <?php endif; ?>
        </nav>
    </header>


    <main>
        <section class="intro">
            <h2>Bonjour, <span><?= htmlspecialchars($username) ?></span> !</h2>
            <p>Besoin d'aide ? Ouvrez un ticket ou discutez avec un administrateur.</p>

            <?php if ($isLoggedIn) : ?>
                <a href="/pages/tickets.php" class="btn">Créer un Ticket</a>
            <?php else : ?>
                <a href="./form/login.php" class="btn">Se connecter</a>
            <?php endif; ?>
        </section>


    </main>

    <footer>
        <p>&copy; 2025 Support Ticket - Tous droits réservés.</p>
    </footer>

</body>

</html>