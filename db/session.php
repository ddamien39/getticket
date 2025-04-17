<?php
    if(session_status() !== PHP_SESSION_ACTIVE)
    {
        session_start();
    }


    function setCurrentUser($id)
    {
        $conn = new PDO("mysql:host=localhost:3306;dbname=getticket", "root", "root");

        $_SESSION["id"] = $id;
    }

    function getCurrentUser()
    {
        $conn = new PDO("mysql:host=localhost:3306;dbname=getticket", "root", "root");

        $stmt = $conn->prepare("SELECT u.id userid, u.username username, u.email email, u.password password, u.role_id role_id, r.name role_name FROM users u INNER JOIN roles r ON u.role_id=r.id WHERE u.id=?");
        $stmt->execute( [$_SESSION["id"]] );

        return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
    }

    function getCurrentRank()
    {
        $conn = new PDO("mysql:host=localhost:3306;dbname=getticket", "root", "root");

        $stmt = $conn->prepare("SELECT u.role_id FROM users u WHERE u.id=?");
        $stmt->execute( [$_SESSION["id"]] );

        return $stmt->fetchAll(PDO::FETCH_ASSOC)[0]["role_id"];
    }

    function getCurrentRankName()
    {
        $conn = new PDO("mysql:host=localhost:3306;dbname=getticket", "root", "root");

        $stmt = $conn->prepare("SELECT r.name FROM users u INNER JOIN roles r ON u.role_id=r.id WHERE u.id=?");
        $stmt->execute( [$_SESSION["id"]] );

        return $stmt->fetchAll(PDO::FETCH_ASSOC)[0]["name"];
    }

    function logout()
    {
        session_unset();
        session_destroy();
    }
?>