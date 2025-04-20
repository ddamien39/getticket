<?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/db/db_conn.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/db/session.php");


    $ticketid = $_GET["ticketid"];
    $currUser = getCurrentUser();


    if(isset($ticketid))
    {
        $stmt = $conn->prepare("SELECT user_id, message, created_at, system_msg, is_read FROM ticket_replies WHERE ticket_id=?");
        $stmt->execute([$ticketid]);
        $replies = $stmt->fetchAll();
        if($stmt->rowCount() >= 1)
        {
            $stmt = $conn->prepare("SELECT id,user_id FROM tickets WHERE id=?");
            $stmt->execute([$ticketid]);
            $selectedticket = $stmt->fetchAll()[0];

            if($selectedticket["user_id"] != $currUser["userid"] && $currUser["role_id"] != 2)
            {
                die("unsufficient permisions");
            }

            
            $stmt = $conn->prepare("UPDATE ticket_replies SET is_read=1 WHERE ticket_id=? AND user_id <> ?");
            $stmt->execute([$ticketid, $currUser["userid"]]);


            header('Content-type: application/json');
            echo json_encode($replies);
        }
    }
?>