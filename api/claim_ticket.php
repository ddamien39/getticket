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

    if(!is_null($selectedTicket["claimed_by"]))
    {
        die("ticket is already claimed...");
    }
    $stmt = $conn->prepare("UPDATE tickets SET claimed_by=? WHERE id=?");
    $stmt->execute([$currUser["userid"], $ticketid]);

    $stmt = $conn->prepare("INSERT INTO ticket_replies(ticket_id, user_id, message, system_msg) VALUES(?, ?, ?, 1)");
    $stmt->execute([$ticketid, $currUser["userid"], "Your ticket was claimed by " . $currUser["username"]]);
?>