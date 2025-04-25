<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/db/db_connect.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/db/session.php");


$ticketid = $_GET["ticketid"];
$currUser = getCurrentUser();

if ($currUser["role_id"] != "2") {
    die("you are not admin");
}

$stmt = $conn->prepare("SELECT * FROM tickets WHERE id=?");
$stmt->execute([$ticketid]);
$selectedTicket = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];

if (is_null($selectedTicket["claimed_by"])) {
    die("ticket is not claimed...");
}

if ($selectedTicket["claimed_by"] != $currUser["userid"]) {
    die("you are not in charge of the ticket...");
}
$stmt = $conn->prepare("UPDATE tickets SET claimed_by=NULL WHERE id=?");
$stmt->execute([$ticketid]);
