<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/db/db_conn.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/db/session.php");

    if(isset($_GET) && isset($_GET["msg"]) && isset($_GET["ticketid"]))
    {
        $currUser = getCurrentUser();

        $stmt = $conn->prepare("SELECT * FROM tickets WHERE id=?");
        $stmt->execute([$_GET["ticketid"]]);
        if ($stmt->rowCount() == 0)
        {
            die("unexisting ticket");
        }

        $ticketObj = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];

        if($currUser["userid"] != $ticketObj["user_id"] && $currUser["role_id"] != "2")
        {
            die("Unsufficient Permissions.");
        }


        $stmt = $conn->prepare("INSERT INTO ticket_replies(ticket_id, user_id, message) VALUES(?, ?, ?)");
        $stmt->execute([$ticketObj["id"], $currUser["userid"], $_GET["msg"]]);
    }
?>