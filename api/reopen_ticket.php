<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/db/db_connect.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/db/session.php");


$ticketid = $_GET["ticketid"];
$currUser = getCurrentUser();



$stmt = $conn->prepare("SELECT * FROM tickets WHERE id=?");
$stmt->execute([$ticketid]);
$selectedTicket = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];

if ($currUser["role_id"] != "2" && $selectedTicket["user_id"] != $currUser["userid"]) {
    die("unauthorized");
}

if ($selectedTicket["status"] == "open") {
    die("the ticket is already open...");
}


$stmt = $conn->prepare("UPDATE tickets SET status=1 WHERE id=?");
$stmt->execute([$ticketid]);

$stmt = $conn->prepare("INSERT INTO ticket_replies(ticket_id, user_id, message, system_msg) VALUES(?, ?, ?, 1)");
$stmt->execute([$ticketid, $currUser["userid"], "Ticket re-opened by " . $currUser["username"]]);
