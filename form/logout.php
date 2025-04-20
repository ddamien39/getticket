<?php
// Démarrer la session
session_start();

// Détruire toutes les variables de session
session_unset();

// Détruire la session
session_destroy();

// Redirection vers la page de connexion ou d'accueil
header("Location: /login.php"); // Remplace "/login.php" par l'URL souhaitée
exit();
