<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/db/db_conn.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/db/session.php");

    $ticket_title = $_GET["title"];
    $ticket_description = $_GET["description"];
    
    $currUser = getCurrentUser();

    if(!isset($ticket_description) || !isset($ticket_title))
    {
        die("missing information");
    }

    if(is_null($currUser))
    {
        die("you must login first.");
    }

    $stmt = $conn->prepare("SELECT * FROM tickets WHERE user_id=? AND status=1");
    $stmt->execute([$currUser["userid"]]);
    $userticketcount = $stmt->rowCount();

    if($userticketcount >= 3)
    {
        die("max 3 tickets");
    }

    $stmt = $conn->prepare("INSERT INTO tickets(user_id, title, description) VALUES(?, ?, ?)");
    $stmt->execute([$currUser["userid"], $ticket_title, $ticket_description]);
?>