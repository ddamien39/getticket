<?php
require_once '../db_connect.php';
session_start();

if (!isset($_SESSION["role_id"]) || $_SESSION["role_id"] !== 2) {
    die("Accès refusé.");
}

$user_id = $_GET['id'];
$duration = $_GET['duration'];

if ($duration === "permanent") {
    $banned_until = "9999-12-31 23:59:59"; // Bannissement à vie
} else {
    $banned_until = date('Y-m-d H:i:s', strtotime("+$duration days"));
}

$stmt = $conn->prepare("UPDATE users SET banned_until = ? WHERE id = ?");
$stmt->execute([$banned_until, $user_id]);

header("Location: manage_users.php");
exit();
