<?php

$sName = "localhost";
$uName = "root";
$pass = "root";
$db_name = "getticket";
global $pdo;


try {
    $pdo = new PDO(
        "mysql:host=$sName;dbname=$db_name;charset=utf8",
        $uName,
        $pass
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
