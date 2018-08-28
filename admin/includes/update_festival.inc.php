<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../../classes/event.class.php');
include('../../includes/functions.inc.php');

$event = new Event();

$ID = safeInt($_POST['FID']);
$name = safeString($_POST['name']);
$description = safeString($_POST['description']);
$lineup = safeString($_POST['lineup']);
$image = safeString($_POST['image']);
$location = safeString($_POST['location']);
$startDate = safeString($_POST['startDate']);
$endDate = safeString($_POST['endDate']);
$price = safeFloat($_POST['price']);
$numTickets = safeInt($_POST['numTickets']);

$event->editFestival
	(
		$ID, $name, $description,$lineup, $image, $location, $startDate,
		$endDate, $price, $numTickets
	);



?>
