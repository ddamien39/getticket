<?php
require_once '../db_connect.php';
session_start();

if (!isset($_SESSION["role_id"]) || $_SESSION["role_id"] !== 2) {
    die("Accès refusé.");
}

$user_id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([$user_id]);

header("Location: manage_users.php");
exit();
