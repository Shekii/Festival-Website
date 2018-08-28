<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../../includes/conn.inc.php');
include('functions.inc.php');

//Festival table
$festivalName= safeString($_POST['name']);
$festivalDescription=safeString($_POST['description']);
$festivalImage = safeString($_POST['image']);
$lineUp= safeString($_POST['lineup']);
$musicTypeId = safeInt($_POST['musicTypeId']);

//Ticket Table
$price = safeFloat($_POST['price']);
$numTickets = safeInt($_POST['numTickets']);

//Venue table
$festivalLocation= safeString($_POST['location']);
$startDate= safeString($_POST['startDate']);
$endDate= safeString($_POST['endDate']);


//Ticket SQL
$addTicketSql = "INSERT INTO tickets VALUES(DEFAULT, :ticketPrice, :numTickets)";

$addTicketStmt = $pdo-> prepare($addTicketSql);

$addTicketStmt->bindParam(':ticketPrice', $price, PDO::PARAM_STR); 
$addTicketStmt->bindParam(':numTickets', $numTickets, PDO::PARAM_INT); 
$addTicketStmt->execute();

//Venue SQL
$addVenueSql = "INSERT INTO venue VALUES(DEFAULT, :location, :venueStart, :venueEnd)";

$addVenueStmt = $pdo-> prepare($addVenueSql);

$addVenueStmt->bindParam(':location', $festivalLocation, PDO::PARAM_STR); 
$addVenueStmt->bindParam(':venueStart', $startDate, PDO::PARAM_STR); 
$addVenueStmt->bindParam(':venueEnd', $endDate, PDO::PARAM_STR); 
$addVenueStmt->execute();


//Festival SQL

$lastIDStmt = $pdo->query("SELECT LAST_INSERT_ID() FROM venue");
$lastId = $lastIDStmt->fetch(PDO::FETCH_NUM);
$lastId = $lastId[0];

$addFestivalSql = "INSERT INTO festivals VALUES(DEFAULT, :festivalName, :festivalDescription, 
										:festivalImage, :festivalLineup, :musicTypeId, :lastID,  :lastID)";							
 $addFestivalStmt = $pdo->	prepare($addFestivalSql);

 $addFestivalStmt->bindParam(':festivalName', $festivalName, PDO::PARAM_STR); 
 $addFestivalStmt->bindParam(':festivalDescription', $festivalDescription, PDO::PARAM_STR); 
 $addFestivalStmt->bindParam(':festivalImage', $festivalImage, PDO::PARAM_STR); 
 $addFestivalStmt->bindParam(':festivalLineup', $lineUp, PDO::PARAM_STR); 
 $addFestivalStmt->bindParam(':musicTypeId', $musicTypeId, PDO::PARAM_INT); 
 $addFestivalStmt->bindParam(':lastID', $lastId, PDO::PARAM_INT); 
$addFestivalStmt->execute();


?>