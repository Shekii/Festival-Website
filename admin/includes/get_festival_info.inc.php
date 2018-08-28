<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../../classes/event.class.php');

$event = new Event();

$festivalID = $_GET['FID'];

$festival = $event->getEvent($festivalID);
$venue = $event->getVenue($festivalID);
$ticket = $event->getTicket($festivalID);

/*
	Must combine the three arrays retrieved from the DB and then encode them in JSON
*/
$result = $festival + $venue + $ticket;
echo json_encode($result);
?>