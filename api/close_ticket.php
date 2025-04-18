<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/db/db_conn.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/db/session.php");


    $ticketid = $_GET["ticketid"];
    $currUser = getCurrentUser();

    if($currUser["role_id"] != "2")
    {
        die("you are not admin");
    }

    $stmt = $conn->prepare("SELECT * FROM tickets WHERE id=?");
    $stmt->execute([$ticketid]);
    $selectedTicket = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];


    if($selectedTicket["status"] == "closed")
    {
        die("the ticket is already closed...");
    }


    $stmt = $conn->prepare("UPDATE tickets SET status=3 WHERE id=?");
    $stmt->execute([$ticketid]);
?>